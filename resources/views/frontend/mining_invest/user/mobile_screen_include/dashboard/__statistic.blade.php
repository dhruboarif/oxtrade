<div class="all-feature-mobile mb-3 mobile-screen-show">
    <div class="title">{{ __('All Statistic') }}</div>
    <div class="row">
        <div class="col-12">
            <div class="all-cards-mobile">
                <div class="contents row">
                    <div class="col-12">
                        <div class="single-card">
                            <div class="icon"><i icon-name="arrow-left-right"></i></div>
                            <div class="content">
                                <div class="amount count">{{ $dataCount['total_transaction'] }}</div>
                                <div class="name">{{ __('All Transactions') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-card">
                            <div class="icon"><i icon-name="download"></i></div>
                            <div class="content">
                                <div class="amount">{{ $currencySymbol }}<span
                                        class="count">{{ $dataCount['total_deposit'] }}</span>
                                </div>
                                <div class="name">{{ __('Total Deposit') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-card">
                            <div class="icon"><i icon-name="box"></i></div>
                            <div class="content">
                                <div class="amount">{{ $currencySymbol }}<span
                                        class="count">{{ $dataCount['total_investment'] }}</span>
                                </div>
                                <div class="name">{{ __('Total Investment') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="moretext-2">
                    <div class="contents row">
                        <div class="col-12">
                            <div class="single-card">
                                <div class="icon"><i icon-name="credit-card"></i></div>
                                <div class="content">
                                    <div class="amount"> {{ $currencySymbol }}<span
                                            class="count">{{ $dataCount['total_profit'] }}</span>
                                    </div>
                                    <div class="name">{{ __('Total Profit') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-card">
                                <div class="icon"><i icon-name="log-in"></i></div>
                                <div class="content">
                                    <div class="amount">{{ $currencySymbol }}<span
                                            class="count">{{ $dataCount['total_transfer'] }}</span>
                                    </div>
                                    <div class="name">{{ __('Total Transfer') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-card">
                                <div class="icon"><i icon-name="send"></i></div>
                                <div class="content">
                                    <div class="amount"> {{ $currencySymbol }}<span
                                            class="count">{{ $dataCount['total_withdraw'] }}</span>
                                    </div>
                                    <div class="name">{{ __('Total Withdraw') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-card">
                                <div class="icon"><i icon-name="users-2"></i></div>
                                <div class="content">
                                    <div class="amount"> {{ $currencySymbol }}<span
                                            class="count">{{ $dataCount['total_referral_profit'] }}</span>
                                    </div>
                                    <div class="name">{{ __('Referral Bonus') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-card">
                                <div class="icon"><i icon-name="anchor"></i></div>
                                <div class="content">
                                    <div class="amount">$<span class="count">{{ $dataCount['deposit_bonus'] }}</span>
                                    </div>
                                    <div class="name">{{ __('Deposit Bonus') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-card">
                                <div class="icon"><i icon-name="archive"></i></div>
                                <div class="content">
                                    <div class="amount">{{ $currencySymbol }}<span
                                            class="count">{{ $dataCount['investment_bonus'] }}</span>
                                    </div>
                                    <div class="name"> {{ __('Investment Bonus') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-card">
                                <div class="icon"><i icon-name="gift"></i></div>
                                <div class="content">
                                    <div class="amount count">{{ $dataCount['total_referral'] }}</div>
                                    <div class="name"> {{ __('Total Referral') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-card">
                                <div class="icon"><i icon-name="award"></i></div>
                                <div class="content">
                                    <div class="amount count"> {{ $dataCount['rank_achieved'] }}</div>
                                    <div class="name">{{ __('Rank Achieved') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-card">
                                <div class="icon"><i icon-name="alert-triangle"></i>
                                </div>
                                <div class="content">
                                    <div class="amount count">{{ $dataCount['total_ticket'] }}</div>
                                    <div class="name"> {{ __('Total Ticket') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="centered">
                    <button class="moreless-button-2 site-btn-sm grad-btn">{{ __('Load more') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
