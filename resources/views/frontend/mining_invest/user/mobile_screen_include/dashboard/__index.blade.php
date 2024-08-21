<div class="row">
    <div class="col-12">
        <div class="user-ranking-mobile">
            <div class="icon"><img src="{{ asset($user->avatar ?? 'global/materials/user.png') }}" alt=""/></div>
            <div class="name">
                <h4>{{ __('Hi') }}, {{ $user->full_name }}</h4>
                <p>{{ $user->rank->ranking_name }} - <span>{{ $user->rank->ranking }}</span></p>
            </div>
            <div class="rank-badge"><img src="{{ asset( $user->rank->icon) }}" alt=""/></div>
        </div>
        <div class="user-wallets-mobile">
            <img src="{{ asset('frontend/materials/wallet-shadow.png') }}" alt="" class="wallet-shadow">
            <div class="head">{{ __('All Wallets in') }} {{ $currency }}</div>
            <div class="one">
                <div class="balance">

                    <span class="symbol">{{ $currencySymbol }}</span>{{ Str::before($user->balance, '.') }}<span
                        class="after-dot">.{{ strpos($user->balance, '.') ? Str::after($user->balance, '.') : '00' }} </span>
                </div>
                <div class="wallet">{{ __('Main Wallet') }}</div>
            </div>


            <div class="one p-wal">
                <div class="balance">
                    <span class="symbol">{{ $currencySymbol }}</span>{{ $user->profit_balance }}<span
                        class="after-dot">.{{ strpos($user->profit_balance, '.') ? Str::after($user->profit_balance, '.') : '00' }} </span>
                </div>
                <div class="wallet">{{ __('Profit Wallet') }}</div>
            </div>
            <div class="info">
                <i icon-name="info"></i>{{ __('You Earned') }} {{ $dataCount['profit_last_7_days'] }} {{ $currency }} {{ __('This Week') }}
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="mob-shortcut-btn">
            <a href="{{ route('user.deposit.amount') }}"><i icon-name="download"></i> {{ __('Deposit') }}</a>
            <a href="{{ route('user.schema') }}"><i icon-name="box"></i> {{ __('Investment') }}</a>
            <a href="{{ route('user.withdraw.view') }}"><i icon-name="send"></i> {{ __('Withdraw') }}</a>
        </div>
    </div>


    <div class="col-12">
        <!-- all navigation -->
        @include('frontend::user.mobile_screen_include.dashboard.__navigations')

        <!-- all Statistic -->
        @include('frontend::user.mobile_screen_include.dashboard.__statistic')

        <!-- Recent Transactions -->
        @include('frontend::user.mobile_screen_include.dashboard.__transactions')
    </div>

    <div class="col-12">
        <div class="mobile-ref-url mb-4">
            <div class="all-feature-mobile">
                <div class="title">{{ __('Referral URL') }}</div>
                <div class="mobile-referral-link-form">
                    <input type="text" value="{{ $referral->link }}" id="refLink"/>
                    <button type="submit" onclick="copyRef()">
                        <span id="copy">{{ __('Copy') }}</span>
                    </button>
                </div>
                <p class="referral-joined">{{ $referral->relationships()->count() }} {{ __('peoples are joined by using this URL') }}</p>
            </div>
        </div>
    </div>
</div>
