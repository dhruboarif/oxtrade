<?php

namespace Payment\Flutterwave;

use Illuminate\Support\Facades\Http;
use Payment\Transaction\BaseTxn;

class FlutterwaveTxn extends BaseTxn
{
    public function __construct($txnInfo)
    {
        parent::__construct($txnInfo);
    }

    public function deposit()
    {
        $info = [
            'tx_ref' => $this->txn,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'payment_options' => 'card',
            'redirect_url' => route('ipn.flutterwave'),
            'customer' => [
                'email' => $this->userEmail,
                'name' => $this->userName,
            ],
            'meta' => [
                'price' => $this->amount,
            ],
            'customizations' => [
                'title' => $this->siteName,
                'description' => '',
            ],
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.gateway_info('flutterwave')->secret_key,
            'Content-Type' => 'application/json',
        ])->post('https://api.flutterwave.com/v3/payments', $info);

        $res = $response->json();

        if ($res['status'] == 'success') {
            $link = $res['data']['link'];

            return redirect($link);
        }

        return redirect()->route('status.cancel');

    }
}
