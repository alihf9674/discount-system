<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Support\Discount\Coupon\CouponValidator;
use Exception;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    /**
     * @var CouponValidator
     */
    private $validator;

    public function __construct(CouponValidator $validator)
    {
        $this->middleware('auth');
        $this->validator = $validator;
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'coupon' => ['required', 'exists:coupons,code']
            ]);

            $coupon = Coupon::where('code', $request->coupon)->firstOrFail();

            $this->validator->isValid($coupon);

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
