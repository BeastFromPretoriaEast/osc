<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Service;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class ServiceController extends Controller
{
    public function index(Site $site)
    {
        $services = $site->services;
        return view('services.index', compact('site', 'services'));
    }

    public function create(Site $site)
    {
        return view('services.create', compact('site'));
    }

    public function store(Request $request, Site $site)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'currency'    => 'required|string|in:usd,gbp,eur',
            'amount'      => 'required|numeric|min:0.50',
            'interval'    => 'nullable|in:day,week,month,year',
        ]);

        // Create product + price in Stripe
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $product = $stripe->products->create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
        ]);

        $pricePayload = [
            'product'     => $product->id,
            'currency'    => $data['currency'],
            'unit_amount' => (int) ($data['amount'] * 100),
        ];
        if ($data['interval']) {
            $pricePayload['recurring'] = ['interval' => $data['interval']];
        }
        $price = $stripe->prices->create($pricePayload);

        // Save service locally
        $service = $site->services()->create([
            'name'             => $data['name'],
            'description'      => $data['description'],
            'currency'         => $data['currency'],
            'unit_amount'      => $price->unit_amount,
            'interval'         => $data['interval'],
            'stripe_product_id'=> $product->id,
            'stripe_price_id'  => $price->id,
        ]);

        return redirect()->route('sites.services.show', [$site, $service]);
    }

    public function show(Site $site, Service $service)
    {
        return view('services.show', compact('site', 'service'));
    }

    public function edit(Site $site, Service $service)
    {
        return view('services.edit', compact('site', 'service'));
    }

    public function update(Request $request, Site $site, Service $service)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $service->update($data);

        return redirect()->route('sites.services.show', [$site, $service]);
    }

    public function destroy(Site $site, Service $service)
    {
        $service->delete();

        return redirect()->route('sites.services.index', $site);
    }
}
