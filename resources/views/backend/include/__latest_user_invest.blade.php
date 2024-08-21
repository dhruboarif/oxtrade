<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">{{ __('Latest Registered User') }}</h3>
            </div>
            <div class="site-card-body table-responsive">
                <div class="site-datatable">
                    <table class="data-table mb-0">
                        <thead>
                        <tr>
                            <th>{{ __('Avatar') }}</th>
                            <th>{{ __('User') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Balance') }}</th>
                            <th>{{ __('Profit') }}</th>
                            <th>{{ __('KYC') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['latest_user'] as $user)
                            <tr>
                                <td>
                                    @if(null != $user->avatar)
                                        <img class="avatar avatar-round" src="{{ asset($user->avatar)}}" alt=""
                                             height="40" width="40">
                                    @else
                                        <span
                                            class="avatar-text">{{ $user->first_name[0] }}{{ $user->last_name[0] }}</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.user.edit',$user->id) }}"
                                       class="link">{{ safe($user->username) }}</a></td>
                                <td>
                                    <strong>{{ safe($user->email) }}</strong>
                                </td>
                                <td><strong>{{ $currencySymbol . $user->balance }}</strong></td>
                                <td><strong>{{ $currencySymbol . $user->total_profit }}</strong></td>
                                <td>
                                    @if($user->kyc == 1)
                                        <div class="site-badge success">{{ __('Verified') }}</div>
                                    @else
                                        <div class="site-badge pending">{{ __('Unverified') }}</div>
                                    @endif
                                </td>
                                <td>
                                    @if($user->status == 1)
                                        <div class="site-badge success">{{ __('Active') }}</div>
                                    @else
                                        <div class="site-badge danger">{{ __('DeActivated') }}</div>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{route('admin.user.edit',$user->id)}}"
                                       class="round-icon-btn primary-btn" data-bs-toggle="tooltip" title=""
                                       data-bs-original-title="Edit User"><i icon-name="edit-3"></i></a>
                                    <span type="button"
                                          data-id="{{$user->id}}"
                                          data-name="{{ $user->first_name.' '. $user->last_name }}"
                                          class="send-mail"
                                    ><button class="round-icon-btn red-btn" data-bs-toggle="tooltip"
                                             title="" data-bs-original-title="Send Email"><i
                                                icon-name="mail"></i></button></span>

                                </td>
                            </tr>
                        @endforeach
                        <tr class="centered">
                            <td colspan="7">
                                @if($data['latest_user']->isEmpty())
                                    {{ __('No Data Found') }}
                                @endif
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">{{ __('Latest Investment') }}</h3>
            </div>
            <div class="site-card-body table-responsive">
                <div class="site-datatable">
                    <table class="data-table mb-0">
                        <thead>
                        <tr>
                            <th>{{ __('Avatar') }}</th>
                            <th>{{ __('User') }}</th>
                            <th>{{ __('Schema') }}</th>
                            <th>{{ __('ROI') }}</th>
                            <th>{{ __('Profit') }}</th>
                            <th>{{ __('Capital Back') }}</th>
                            <th>{{ __('Timeline') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['latest_invest'] as $invest)

                            @php
                                $calculateInterest = ($invest->interest*$invest->invest_amount)/100;
                                $interest = $invest->interest_type != 'percentage' ? $invest->interest : $calculateInterest;
                            @endphp


                            <tr>
                                <td>
                                    @if(null != $invest->user->avatar)
                                        <img class="avatar" src="{{ asset($invest->user->avatar)}}" alt=""
                                             height="40" width="40">
                                    @else
                                        <span
                                            class="avatar-text">{{ $invest->user->first_name[0] }}{{ $invest->user->last_name[0] }}</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.user.edit',$invest->user_id) }}"
                                       class="link">{{ safe($invest->user->username) }}</a></td>
                                <td>

                                    <strong> {{ $invest->schema->name }} <i
                                            icon-name="arrow-big-right"></i> {{ $currencySymbol.$invest->invest_amount }}
                                    </strong>

                                </td>
                                <td>
                                    <strong>{{ $invest->interest_type == 'percentage' ? $invest->interest.'%' : $currencySymbol.$invest->interest }}</strong>
                                </td>

                                <td>
                                    <strong>{{ $invest->already_return_profit .' x '.$interest .' = '. ($invest->already_return_profit*$interest).' '. $currency }}</strong>
                                </td>
                                <td>
                                    <div
                                        class="site-badge {{ $invest->capital_back ? 'success' : 'pending' }}">{{ $invest->capital_back ? 'Yes' : 'No' }}</div>
                                </td>
                                <td>

                                    @if($invest->status == App\Enums\InvestStatus::Ongoing)

                                        <div>
                                            <strong><span id="days{{ $invest->id }}"></span>D : <span
                                                    id="hours{{ $invest->id }}"></span>H : <span
                                                    id="minutes{{ $invest->id }}"></span>M : <span
                                                    id="seconds{{ $invest->id }}"></span>S</strong>
                                            <span class="site-badge primary-bg ms-2"
                                                  id="percentage{{ $invest->id }}"></span>
                                        </div>
                                        <div class="progress investment-timeline">
                                            <div
                                                class="progress-bar progress-bar-striped progress-bar-animated"
                                                id="time-progress{{ $invest->id }}" role="progressbar"
                                                aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>

                                        @push('single-script')
                                            <script>
                                                (function ($) {
                                                    "use strict";
                                                    // Countdown
                                                    const second = 1000,
                                                        minute = second * 60,
                                                        hour = minute * 60,
                                                        day = hour * 24;
                                                    let timezone = @json(setting('site_timezone','global'));

                                                    let countDown = new Date('{{$invest->next_profit_time}}').getTime()
                                                    var start = new Date('{{ $invest->last_profit_time ?? $invest->created_at}}').getTime()
                                                    setInterval(function () {

                                                        let utc_datetime_str = new Date().toLocaleString("en-US", {timeZone: timezone});
                                                        let now = new Date(utc_datetime_str).getTime();
                                                        let distance = countDown - now;


                                                        var progress = (((now - start) / (countDown - start)) * 100).toFixed(2);


                                                        $("#time-progress{{ $invest->id }}").css("width", progress + '%');

                                                        $("#percentage{{ $invest->id }}").text(progress >= 100 ? 100 + '%' : progress + '%');

                                                        document.getElementById('days{{ $invest->id }}').innerText = Math.floor(distance < 0 ? 0 : distance / (day)),
                                                            document.getElementById('hours{{ $invest->id }}').innerText = Math.floor(distance < 0 ? 0 : (distance % (day)) / (hour)),
                                                            document.getElementById('minutes{{$invest->id }}').innerText = Math.floor(distance < 0 ? 0 : (distance % (hour)) / (minute)),
                                                            document.getElementById('seconds{{ $invest->id }}').innerText = Math.floor(distance < 0 ? 0 : (distance % (minute)) / second);

                                                    }, second)

                                                })(jQuery)
                                            </script>
                                        @endpush

                                    @elseif($invest->status == App\Enums\InvestStatus::Completed)
                                        <div class="site-badge success">{{ __('Completed') }}</div>
                                        <div class="progress investment-timeline">
                                            <div
                                                class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100" style="width: 100%"></div>
                                        </div>
                                    @elseif($invest->status == App\Enums\InvestStatus::Pending)
                                        <div class="site-badge pending">{{ __('Pending') }}</div>
                                    @else
                                        <div class="site-badge pending">{{ __('Canceled') }}</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        <tr class="centered">
                            <td colspan="7">
                                @if($data['latest_invest']->isEmpty())
                                    {{ __('No Data Found') }}
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
