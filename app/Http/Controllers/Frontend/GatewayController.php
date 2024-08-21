<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\GatewayType;
use App\Http\Controllers\Controller;
use App\Models\DepositMethod;
use App\Traits\NotifyTrait;
use App\Traits\Payment;

class GatewayController extends Controller
{
    use NotifyTrait, Payment;

    public function gateway($code)
    {
        $Gateway = DepositMethod::code($code)->first();

        if ($Gateway->type == GatewayType::Manual->value) {
            $Gateway = DepositMethod::code($code)->first();

            $fieldOptions = $Gateway->field_options;
            $paymentDetails = $Gateway->payment_details;

            $Gateway = array_merge($Gateway->toArray(), ['credentials' => view('frontend::gateway.include.manual', compact('fieldOptions', 'paymentDetails'))->render()]);
        }

        return $Gateway;
    }

    //list json
    public function gatewayList()
    {
        $gateways = DepositMethod::where('status', 1)->get();

        return view('frontend::gateway.include.__list', compact('gateways'));
    }
}
