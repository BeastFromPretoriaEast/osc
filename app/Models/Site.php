<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model {
    protected $fillable = ['name', 'stripe_account_id'];
    public function services() { return $this->hasMany(Service::class); }
}
