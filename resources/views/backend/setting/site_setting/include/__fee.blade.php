<div class="col-xl-6 col-lg-12 col-md-12 col-12">
    <div class="site-card">
        <div class="site-card-header">
            <h3 class="title">{{$fields['title']}}</h3>
        </div>
        <div class="site-card-body">
            @include('backend.setting.site_setting.include.form.__open_action')

            <div class="site-input-groups row">
                <div class="col-sm-4 col-label">{{ __('Send Money Limit') }}</div>
                <div class="col-sm-8">
                    <div class="form-row">
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Min Amount:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="min_send"
                                           value="{{ oldSetting('min_send','fee') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Max Amount:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="max_send"
                                           value="{{ oldSetting('max_send','fee') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="site-input-groups row">
                <label for="" class="col-sm-4 col-label">{{ __('Send Money Charge') }}</label>
                <div class="col-sm-8">
                    <div class="site-input-groups position-relative">
                        <div class="position-relative">
                            <input type="text" class="box-input" value="{{ oldSetting('send_charge','global') }}"
                                   name="send_charge">
                            <div class="prcntcurr">
                                <select name="send_charge_type" class="form-select" id="">
                                    @foreach(['fixed' => setting('currency_symbol','global') , 'percentage' => '%'] as $key => $value)
                                        <option @if( oldSetting('send_charge_type','global') == $key) selected @endif
                                        value="{{ $key }}"> {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-input-groups row">
                <label for="" class="col-sm-4 col-label">{{ __('Wallet Exchange Charge') }}</label>
                <div class="col-sm-8">
                    <div class="site-input-groups position-relative">
                        <div class="position-relative">
                            <input type="text" class="box-input"
                                   value="{{ oldSetting('wallet_exchange_charge','global') }}"
                                   name="wallet_exchange_charge">
                            <div class="prcntcurr">
                                <select name="wallet_exchange_charge_type" class="form-select" id="">
                                    @foreach(['fixed' => setting('currency_symbol','global') , 'percentage' => '%'] as $key => $value)
                                        <option @selected( oldSetting('wallet_exchange_charge_type','global') == $key)
                                                value="{{ $key }}"> {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-input-groups row mb-0">
                <div class="col-sm-4 col-label">{{ __('User Bonus') }}</div>
                <div class="col-sm-8">
                    <div class="form-row">
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Referral Bonus:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="referral_bonus"
                                           value="{{ oldSetting('referral_bonus','fee') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Signup Bonus:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="signup_bonus"
                                           value="{{ oldSetting('signup_bonus','fee') }}">
                                    <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-input-groups row mb-0">
                <div class="col-sm-4 col-label">{{ __('Daily Limits') }}</div>
                <div class="col-sm-8">
                    <div class="form-row">
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Wallet Exchange Daily Limit:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="wallet_exchange_day_limit"
                                           value="{{ oldSetting('wallet_exchange_day_limit','fee') }}">
                                    <span class="input-group-text">{{ __('Times') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Send Money Daily Limit:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="send_money_day_limit"
                                           value="{{ oldSetting('send_money_day_limit','fee') }}">
                                    <span class="input-group-text">{{ __('Times') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Withdraw Daily Limit:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="withdraw_day_limit"
                                           value="{{ oldSetting('withdraw_day_limit','fee') }}">
                                    <span class="input-group-text">{{ __('Times') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-sm-12 col-12">
                            <div class="site-input-groups">
                                <label for="" class="box-input-label">{{ __('Investment Cancellation Daily Limit:') }}</label>
                                <div class="input-group joint-input">
                                    <input type="text" class="form-control" name="investment_cancellation_daily_limit"
                                           value="{{ oldSetting('investment_cancellation_daily_limit','fee') }}">
                                    <span class="input-group-text">{{ __('Times') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @include('backend.setting.site_setting.include.form.__close_action')
        </div>
    </div>
</div>

