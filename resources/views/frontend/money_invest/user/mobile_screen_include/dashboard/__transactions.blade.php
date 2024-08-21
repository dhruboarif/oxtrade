<div class="all-feature-mobile mobile-transactions mb-3 mobile-screen-show">
    <div class="title">{{ __('Recent Transactions') }}</div>
    <div class="contents">

        @foreach($recentTransactions as $transaction )
            <div class="single-transaction">
                <div class="transaction-left">
                    <div class="transaction-des">
                        <div class="transaction-title">{{ $transaction->description }}
                        </div>
                        <div class="transaction-id">{{ $transaction->tnx }}</div>
                        <div class="transaction-date">{{ $transaction->created_at }}</div>
                    </div>
                </div>
                <div class="transaction-right">
                    <div class="transaction-amount {{ txn_type($transaction->type->value,['add','sub']) }}">
                        {{txn_type($transaction->type->value,['+','-']).$transaction->amount .' '.$currency}}</div>
                    <div class="transaction-fee sub">-{{  $transaction->charge.' '. $currency .' '.__('Fee') }} </div>
                    <div class="transaction-gateway">{{ $transaction->method }}</div>


                    @if($transaction->status->value == \App\Enums\TxnStatus::Pending->value)
                        <div class="transaction-status pending">{{ __('Pending') }}</div>
                    @elseif($transaction->status->value ==  \App\Enums\TxnStatus::Success->value)
                        <div class="transaction-status success">{{ __('Success') }}</div>
                    @elseif($transaction->status->value ==  \App\Enums\TxnStatus::Failed->value)
                        <div class="transaction-status canceled">{{ __('canceled') }}</div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
