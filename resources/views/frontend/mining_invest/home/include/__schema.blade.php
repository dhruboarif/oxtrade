@php
    $schemas = \App\Models\Schema::where('status',true)->with('schedule')->get();
@endphp
<section class="white-bg section-style-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-12">
                <div class="section-title text-center">
                    <h4 data-aos="fade-down" data-aos-duration="2000">{{ $data['title_small'] }}</h4>
                    <h2 data-aos="fade-down" data-aos-duration="1500">{{ $data['title_big'] }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($schemas as $schema)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="single-investment-plan" data-aos="fade-up" data-aos-duration="1500">

                    <div class="investment-plan-icon">
                        <img src="{{ asset($schema->icon) }}" alt=""/>
                        <div class="tranding-icon">
                            @if($schema->is_trending)
                            <i icon-name="zap "></i>
                            @else
                            <i icon-name="zap-off"></i>
                            @endif
                        </div>
                    </div>
                    @if($schema->badge)
                        <div class="feature-plan">{{$schema->badge}}</div>
                    @endif

                    <div class="content">
                        <h3>{{$schema->name}}</h3>
                        <h4>{{ $schema->type == 'range' ? $currencySymbol . $schema->min_amount . ' - ' . $currencySymbol . $schema->max_amount : $currencySymbol . $schema->fixed_amount }}</h4>
                        <ul>
                            <li><i icon-name="diamond"></i>{{ $schema->schedule->name.' '. __('Returns') }}<span>{{ $schema->interest_type == 'percentage' ? $schema->return_interest.'%' : $currencySymbol.$schema->return_interest  }}</span></li>
                            <li><i icon-name="diamond"></i>{{ __('Capital Return') }}<span>{{ $schema->capital_back ? __('Yes') : __('No') }}</span></li>
                            <li><i icon-name="diamond"></i>{{ __('Return Type') }}<span>{{ __(ucwords($schema->return_type)) }}</span></li>
                            <li><i icon-name="diamond"></i>{{ __('Total Periods') }}<span>{{ ($schema->return_type == 'period' ? $schema->number_of_period.' ' : __('Unlimited').' ' ).($schema->number_of_period == 1 ? __('Time') : __('Times') )  }}</span></li>
                            <li><i icon-name="diamond"></i>{{ __('Cancellation') }}<span>@if($schema->schema_cancel) {{ __('In').' '. $schema->expiry_minute .' '. 'Minute' }} @else   {{ __('No') }}@endif</span></li>
                            <li><i icon-name="diamond"></i>{{ __('Total Revenue') }}<span>{{ $schema->total_revenue }}</span></li>
                        </ul>

                        <div class="holidays"><span>*</span>@if( null != $schema->off_days) {{ implode(', ', json_decode($schema->off_days,true))  .' '.__('are')}}  @else {{ __('No Profit') }} @endif {{ __('Holidays') }}</div>

                    </div>
                    <a href="{{route('user.schema.preview',$schema->id)}}" class="investment-btn w-100 centered"><i icon-name="zap"></i>{{ __('Invest Now') }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
