<?php

namespace App\Support\Discount\Coupon\Traits;

use App\Models\Coupon;

trait Couponable
{
    public function coupons(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Coupon::class,'couponable');
    }
}
