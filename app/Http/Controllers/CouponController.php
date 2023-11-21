<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Exception;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'coupon' => ['required', 'exists:coupons,code']
            ]);

            $coupon = Coupon::where('code', $request->coupon)->firstOrFail();

            session()->put(['coupon' => $coupon]);

            return redirect()->back()->withSuccess('کد تخفیف با موفقیت اعمال شد');

        } catch (Exception $e) {
            return redirect()->back()->withError('کد تخفیف نامعتبر میباشد.');
        }

    }

    public function remove()
    {
        session()->forget('coupon');
        return back();
    }
}
