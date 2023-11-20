<?php

namespace App\Support\Payment\Gateways;

use App\Order;
use Illuminate\Http\Request;

class Pasargad implements GatewayInterface
{
    public function getName(): string
    {
        return 'pasargad';
    }

    public function pay(Order $order, int $amount)
    {
        // TODO: Implement pay() method.
    }

    public function verify(Request $request)
    {
        // TODO: Implement verify() method.
    }
}
