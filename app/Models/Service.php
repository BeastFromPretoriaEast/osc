<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {
    protected $fillable = [
        'site_id','name','description','currency','unit_amount','interval','stripe_product_id','stripe_price_id'
    ];
    public function site() { return $this->belongsTo(Site::class); }
}
