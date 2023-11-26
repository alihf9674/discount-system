<?php

namespace App\Support\Discount\Coupon\Traits;

use App\Models\Coupon;
use Carbon\Carbon;

trait Couponable
{
    public function coupons(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Coupon::class, 'couponable');
    }

    public function validCoupons()
    {
        return $this->coupons->where('expire_time', '>', Carbon::now());
    }
}
