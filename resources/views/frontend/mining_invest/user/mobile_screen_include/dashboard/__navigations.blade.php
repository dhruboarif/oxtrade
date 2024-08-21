<div class="all-feature-mobile mb-3 mobile-screen-show">
    <div class="title">{{ __('All Navigations') }}</div>
    <div class="contents row">
        <div class="col-4">
            <div class="single">
                <a href="{{ route('user.schema') }}">
                    <div class="icon"><img src="{{ asset('frontend/materials/schema.png') }}" alt="">
                    </div>
                    <div class="name">{{ __('Schemas') }}</div>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="single">
                <a href="{{ route('user.invest-logs') }}">
                    <div class="icon"><img src="{{ asset('frontend/materials/schema-log.png') }}" alt="">
                    </div>
                    <div class="name">{{ __('Investment') }}</div>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="single">
                <a href="{{ route('user.transactions') }}">
                    <div class="icon"><img src="{{ asset('frontend/materials/transactions.png') }}" alt="">
                    </div>
                    <div class="name">{{ __('Transactions') }}</div>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="single">
                <a href="{{ route('user.deposit.amount') }}">
                    <div class="icon"><img src="{{ asset('frontend/materials/deposit.png') }}" alt="">
                    </div>
                    <div class="name">{{ __('Deposit') }}</div>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="single">
                <a href="{{ route('user.deposit.log') }}">
                    <div class="icon"><img src="{{ asset('frontend/materials/deposit-log.png') }}" alt="">
                    </div>
                    <div class="name">{{ __('Deposit Log') }}</div>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="single">
                <a href="{{ route('user.wallet-exchange') }}">
                    <div class="icon"><img src="{{ asset('frontend/materials/wallet-exchange.png') }}"
                                           alt="">
                    </div>
                    <div class="name">{{ __('Wallet Exch.') }}</div>
                </a>
            </div>
        </div>
    </div>
    <div class="moretext">
        <div class="row contents">
            <div class="col-4">
                <div class="single">
                    <a href="{{ route('user.send-money.view') }}">
                        <div class="icon"><img src="{{ asset('frontend/materials/transfer.png') }}"
                                               alt="">
                        </div>
                        <div class="name">{{ __('Transfer') }}</div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="single">
                    <a href="{{ route('user.send-money.log') }}">
                        <div class="icon"><img src="{{ asset('frontend/materials/transfer-log.png') }}"
                                               alt="">
                        </div>
                        <div class="name">{{ __('Transfer Log') }}</div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="single">
                    <a href="{{ route('user.withdraw.view') }}">
                        <div class="icon"><img src="{{ asset('frontend/materials/withdraw.png') }}"
                                               alt="">
                        </div>
                        <div class="name">{{ __('Withdraw') }}</div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="single">
                    <a href="{{ route('user.withdraw.log') }}">
                        <div class="icon"><img src="{{ asset('frontend/materials/withdraw-log.png') }}"
                                               alt="">
                        </div>
                        <div class="name">{{ __('Withdraw Log') }}</div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="single">
                    <a href="{{ route('user.ranking-badge') }}">
                        <div class="icon"><img src="{{ asset('frontend/materials/ranking.png') }}"
                                               alt="">
                        </div>
                        <div class="name">{{ __('Ranking Badge') }}</div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="single">
                    <a href="{{ route('user.referral') }}">
                        <div class="icon"><img src="{{ asset('frontend/materials/referral.png') }}"
                                               alt="">
                        </div>
                        <div class="name">{{ __('Referral') }}</div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="single">
                    <a href="{{ route('user.setting.show') }}">
                        <div class="icon"><img src="{{ asset('frontend/materials/settings.png') }}"
                                               alt="">
                        </div>
                        <div class="name">{{ __('Settings') }}</div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="single">
                    <a href="{{ route('user.ticket.index') }}">
                        <div class="icon"><img src="{{ asset('frontend/materials/support-ticket.png') }}"
                                               alt="">
                        </div>
                        <div class="name">{{ __('Support Ticket') }}</div>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="single">
                    <a href="{{ route('user.notification.all') }}">
                        <div class="icon"><img src="{{ asset('frontend/materials/profile.png') }}"
                                               alt="">
                        </div>
                        <div class="name">{{ __('Notifications') }}</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="centered">
        <button class="moreless-button site-btn-sm grad-btn">{{ __('Load more') }}</button>
    </div>
</div>
