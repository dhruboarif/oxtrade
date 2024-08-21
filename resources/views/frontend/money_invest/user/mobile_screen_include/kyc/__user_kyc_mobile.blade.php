<div class="row mobile-screen-show">
    <div class="col-12">
        <div class="user-kyc-mobile">
            @if($user->kyc == \App\Enums\KYCStatus::Pending->value)
                <i icon-name="fingerprint" class="kyc-star"></i>
                {{ __('KYC Pending') }}
            @elseif($user->kyc != \App\Enums\KYCStatus::Verified->value)
                <i icon-name="fingerprint" class="kyc-star"></i>
                {{ __('Please Verify Your Identity') }} <a
                    href="{{ route('user.kyc') }}">{{ __('Submit Now') }}</a>
            @endif
        </div>
    </div>
</div>
