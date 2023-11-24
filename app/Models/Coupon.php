<?php

namespace App\Models;

use App\Support\Discount\Coupon\Traits\Couponable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory, Couponable;

    public function isExpired(): bool
    {
        return Carbon::now()->isAfter(Carbon::parse($this->expire_time));
    }
}
