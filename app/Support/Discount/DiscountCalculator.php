<?php

namespace App\Support\Discount;

use App\Models\Coupon;

class DiscountCalculator
{
    public function discountAmount(Coupon $coupon, int $totalAmount)
    {
        $discountAmount = (int)(($coupon->percent / 100) * $totalAmount);

        return $this->isExceeded($discountAmount, $coupon->limit) ? $coupon->limit : $discountAmount;
    }

    private function isExceeded(int $amount, int $limit): bool
    {
        return $amount > $limit;
    }
}
