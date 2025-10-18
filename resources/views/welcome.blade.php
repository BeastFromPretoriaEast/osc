{{-- resources/views/home.blade.php --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Smart Community — Smart communities, simplified</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        /* subtle animated blobs for a funky touch */
        .blob{position:absolute;border-radius:9999px;filter:blur(60px);opacity:.28;animation:float 12s ease-in-out infinite}
        .blob-1{width:30rem;height:30rem;left:-8rem;top:-8rem;background:#8A2334}
        .blob-2{width:26rem;height:26rem;right:-10rem;bottom:-10rem;background:#2AA4F4;animation-delay:-6s}
        @keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(18px)}}
    </style>
</head>
<body class="antialiased bg-[#F5F6F8] text-[#565656]">

{{-- Header --}}
<header class="sticky top-0 z-40 border-b border-neutral-200 bg-white/80 backdrop-blur-xl">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <a href="{{ url('/') }}" class="flex items-center gap-3">
            <img src="{{ asset('images/osc-logo.svg') }}" class="h-7 w-auto" alt="OSC Logo">
            <span class="hidden sm:inline text-sm text-neutral-600">Our Smart Community</span>
        </a>

        <nav class="hidden md:flex items-center gap-6 text-sm">
            <a href="#features" class="text-neutral-600 hover:text-neutral-900">Features</a>
            <a href="#how" class="text-neutral-600 hover:text-neutral-900">How it works</a>
            <a href="#pricing" class="text-neutral-600 hover:text-neutral-900">Pricing</a>
            <a href="#contact" class="text-neutral-600 hover:text-neutral-900">Contact</a>
        </nav>

        <div class="flex items-center gap-3">
            <a href="#" class="inline-flex items-center rounded-xl px-4 py-2 text-sm font-medium border border-neutral-200 bg-white text-neutral-800 hover:bg-neutral-50">Sign in</a>
            <a href="#get-started" class="inline-flex items-center rounded-xl px-4 py-2 text-sm font-medium shadow-sm border border-neutral-200 bg-[#8A2334] text-white hover:opacity-95">Get Started</a>
        </div>
    </div>
</header>

<main>

    {{-- Hero --}}
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 -z-10 pointer-events-none">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
        </div>

        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-16 sm:py-24 md:grid-cols-2 lg:gap-16 sm:px-6 lg:px-8">
            <div>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight">
                    Smart communities, <span class="text-[#8A2334]">simplified</span>.
                </h1>
                <p class="mt-4 text-lg text-neutral-600 max-w-prose">
                    Manage sites, units, tenants, subscriptions and support in one beautiful dashboard.
                    Stripe-ready, multi-tenant, blazing fast.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="#get-started" class="inline-flex items-center rounded-xl px-4 py-2 font-medium shadow-sm border border-neutral-200 bg-[#8A2334] text-white hover:opacity-95">Launch Demo</a>
                    <a href="#features" class="inline-flex items-center rounded-xl px-4 py-2 font-medium border border-neutral-200 bg-white text-neutral-800 hover:bg-neutral-50">Explore Features</a>
                </div>

                <div class="mt-8 grid grid-cols-3 gap-4">
                    <div class="rounded-2xl bg-white/70 backdrop-blur-xl border border-neutral-200 p-4 text-center">
                        <div class="text-3xl font-bold tracking-tight text-[#8A2334]">120+</div>
                        <div class="text-[11px] uppercase tracking-wide text-neutral-600 mt-1">Sites</div>
                    </div>
                    <div class="rounded-2xl bg-white/70 backdrop-blur-xl border border-neutral-200 p-4 text-center">
                        <div class="text-3xl font-bold tracking-tight text-[#8A2334]">4.9★</div>
                        <div class="text-[11px] uppercase tracking-wide text-neutral-600 mt-1">SLA Rating</div>
                    </div>
                    <div class="rounded-2xl bg-white/70 backdrop-blur-xl border border-neutral-200 p-4 text-center">
                        <div class="text-3xl font-bold tracking-tight text-[#8A2334]">£1.2m</div>
                        <div class="text-[11px] uppercase tracking-wide text-neutral-600 mt-1">Processed</div>
                    </div>
                </div>
            </div>

            {{-- Preview tiles --}}
            <div class="relative">
                <div class="rounded-2xl p-4 border border-neutral-200 bg-white/80 backdrop-blur-xl shadow-sm">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-xl p-4 border border-neutral-200 bg-white">
                            <div class="text-2xl">🏢</div>
                            <div class="font-semibold mt-1">Sites</div>
                            <p class="text-sm text-neutral-600">Multi-site, branded portals per property.</p>
                        </div>
                        <div class="rounded-xl p-4 border border-neutral-200 bg-white">
                            <div class="text-2xl">🧩</div>
                            <div class="font-semibold mt-1">Subscriptions</div>
                            <p class="text-sm text-neutral-600">Bundles, add-ons, per-unit pricing.</p>
                        </div>
                        <div class="rounded-xl p-4 border border-neutral-200 bg-white">
                            <div class="text-2xl">👥</div>
                            <div class="font-semibold mt-1">Tenants</div>
                            <p class="text-sm text-neutral-600">Profiles, units, permissions.</p>
                        </div>
                        <div class="rounded-xl p-4 border border-neutral-200 bg-white">
                            <div class="text-2xl">🎫</div>
                            <div class="font-semibold mt-1">Support</div>
                            <p class="text-sm text-neutral-600">Notes, assignments, SLAs.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-sm text-neutral-500 text-center">Stripe Connect • Laravel 11 • Orchid Admin</div>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section id="features" class="py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 text-center">
                <span class="inline-block text-xs font-semibold tracking-widest uppercase text-neutral-500">Why OSC</span>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight">Everything you need to run a smart community</h2>
                <p class="mt-2 text-neutral-600">Opinionated defaults, clean UI, scalable patterns.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="rounded-2xl p-6 border border-neutral-200 bg-white/80 backdrop-blur-xl shadow-sm hover:shadow-md transition">
                    <div class="grid place-items-center h-10 w-10 rounded-xl border border-neutral-200 bg-white text-xl">🔒</div>
                    <h3 class="mt-3 text-lg font-semibold text-neutral-900">Role-based access</h3>
                    <p class="text-sm text-neutral-600 leading-relaxed">Fine-grained permissions for admins, managers, tenants and staff.</p>
                </div>

                <div class="rounded-2xl p-6 border border-neutral-200 bg-white/80 backdrop-blur-xl shadow-sm hover:shadow-md transition">
                    <div class="grid place-items-center h-10 w-10 rounded-xl border border-neutral-200 bg-white text-xl">⚡</div>
                    <h3 class="mt-3 text-lg font-semibold text-neutral-900">Stripe-ready billing</h3>
                    <p class="text-sm text-neutral-600 leading-relaxed">Stripe Connect per site, invoices, statements and payouts.</p>
                </div>

                <div class="rounded-2xl p-6 border border-neutral-200 bg-white/80 backdrop-blur-xl shadow-sm hover:shadow-md transition">
                    <div class="grid place-items-center h-10 w-10 rounded-xl border border-neutral-200 bg-white text-xl">📈</div>
                    <h3 class="mt-3 text-lg font-semibold text-neutral-900">Insights</h3>
                    <p class="text-sm text-neutral-600 leading-relaxed">KPI snapshots for occupancy, churn, ARPU and SLA performance.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- How it works --}}
    <section id="how" class="py-14">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <ol class="grid gap-6 md:grid-cols-3">
                <li class="rounded-2xl border border-neutral-200 bg-white p-6">
                    <div class="text-sm font-semibold text-neutral-500">Step 1</div>
                    <h3 class="mt-1 font-semibold">Create a site</h3>
                    <p class="text-sm text-neutral-600">Branding, Stripe keys, roles & permissions.</p>
                </li>
                <li class="rounded-2xl border border-neutral-200 bg-white p-6">
                    <div class="text-sm font-semibold text-neutral-500">Step 2</div>
                    <h3 class="mt-1 font-semibold">Add units & tenants</h3>
                    <p class="text-sm text-neutral-600">Import via CSV or create inline.</p>
                </li>
                <li class="rounded-2xl border border-neutral-200 bg-white p-6">
                    <div class="text-sm font-semibold text-neutral-500">Step 3</div>
                    <h3 class="mt-1 font-semibold">Enable subscriptions</h3>
                    <p class="text-sm text-neutral-600">Bundles, add-ons and price tiers.</p>
                </li>
            </ol>
        </div>
    </section>

    {{-- Pricing (placeholder) --}}
    <section id="pricing" class="py-16 bg-white">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center">Simple pricing</h2>
            <p class="mt-2 text-center text-neutral-600">Start free, scale as you grow.</p>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div class="rounded-2xl border border-neutral-200 p-6">
                    <h3 class="font-semibold">Starter</h3>
                    <div class="mt-2 text-3xl font-bold text-[#8A2334]">£0</div>
                    <ul class="mt-4 space-y-2 text-sm text-neutral-600">
                        <li>• 1 Site</li>
                        <li>• 50 Units</li>
                        <li>• Email support</li>
                    </ul>
                    <a href="#" class="mt-6 inline-flex w-full justify-center rounded-xl px-4 py-2 font-medium border border-neutral-200 bg-white hover:bg-neutral-50">Choose</a>
                </div>
                <div class="rounded-2xl border-2 border-[#8A2334] p-6 shadow-sm">
                    <h3 class="font-semibold">Pro</h3>
                    <div class="mt-2 text-3xl font-bold text-[#8A2334]">£49<span class="text-base text-neutral-500">/mo</span></div>
                    <ul class="mt-4 space-y-2 text-sm text-neutral-600">
                        <li>• 5 Sites</li>
                        <li>• 1,000 Units</li>
                        <li>• Priority support</li>
                    </ul>
                    <a href="#" class="mt-6 inline-flex w-full justify-center rounded-xl px-4 py-2 font-medium shadow-sm border border-neutral-200 bg-[#8A2334] text-white hover:opacity-95">Choose</a>
                </div>
                <div class="rounded-2xl border border-neutral-200 p-6">
                    <h3 class="font-semibold">Enterprise</h3>
                    <div class="mt-2 text-3xl font-bold text-[#8A2334]">Custom</div>
                    <ul class="mt-4 space-y-2 text-sm text-neutral-600">
                        <li>• Unlimited Sites</li>
                        <li>• Unlimited Units</li>
                        <li>• SLA & SSO</li>
                    </ul>
                    <a href="#" class="mt-6 inline-flex w-full justify-center rounded-xl px-4 py-2 font-medium border border-neutral-200 bg-white hover:bg-neutral-50">Contact sales</a>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section id="get-started" class="py-14">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-neutral-200 bg-white/80 backdrop-blur-xl p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6">
                <div>
                    <h3 class="text-2xl font-semibold">Ready to build your first site?</h3>
                    <p class="text-neutral-600">Spin up a branded portal in minutes with sensible defaults.</p>
                </div>
                <a href="#" class="inline-flex items-center rounded-xl px-5 py-3 font-medium shadow-sm border border-neutral-200 bg-[#8A2334] text-white hover:opacity-95">Create Site</a>
            </div>
        </div>
    </section>

</main>

{{-- Footer --}}
<footer id="contact" class="border-t border-neutral-200 bg-white">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:px-6 lg:px-8 md:grid-cols-3 items-center">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/osc-logo.svg') }}" class="h-6 w-auto" alt="OSC Logo">
            <span class="text-sm text-neutral-600">© {{ date('Y') }} Our Smart Community</span>
        </div>
        <p class="text-center text-sm text-neutral-600">Serious Systems. Beautiful Experience.</p>
        <div class="md:text-right text-sm space-x-4">
            <a href="#" class="text-neutral-600 hover:text-neutral-900">Privacy</a>
            <a href="#" class="text-neutral-600 hover:text-neutral-900">Terms</a>
            <a href="#contact" class="text-neutral-600 hover:text-neutral-900">Contact</a>
        </div>
    </div>
</footer>

</body>
</html>
