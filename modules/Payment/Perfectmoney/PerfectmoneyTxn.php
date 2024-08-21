<?php

namespace Payment\Perfectmoney;

use charlesassets\LaravelPerfectMoney\PerfectMoney;
use Payment\Transaction\BaseTxn;

class PerfectmoneyTxn extends BaseTxn
{
    public function __construct($txnInfo)
    {
        parent::__construct($txnInfo);
    }

    public function deposit()
    {
        $paymentUrl = route('ipn.perfectMoney');
        $noPaymentUrl = route('status.cancel');

        return PerfectMoney::render(['PAYMENT_AMOUNT' => $this->amount, 'PAYMENT_ID' => $this->txn, 'PAYMENT_URL' => $paymentUrl, 'PAYMENT_UNITS' => $this->currency, 'NOPAYMENT_URL' => $noPaymentUrl, 'NOPAYMENT_URL_METHOD' => 'GET']);
    }
}
