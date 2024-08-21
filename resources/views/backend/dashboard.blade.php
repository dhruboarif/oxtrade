@php use App\Enums\InvestStatus; @endphp
@extends('backend.layouts.app')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title">{{ setting('site_title', 'global') }} {{ __('Dashboard') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @canany(['deposit-action','withdraw-action','kyc-action',])
                    @if($data['withdraw_count'] || $data['kyc_count'] || $data['deposit_count'])
                        <div class="col-xl-12">
                            <div class="admin-latest-announcements">
                                <div class="content"><i
                                        icon-name="zap"></i>{{ __("Explore what's important to review first") }}</div>
                                <div class="content">
                                    @can('withdraw-action')
                                        @if($data['withdraw_count'])
                                            <a href="{{ route('admin.withdraw.pending') }}" class="site-btn-xs red-btn"><i
                                                    icon-name="loader"
                                                    class="spining-icon"></i>{{ __('Withdraw Requests') }}
                                                ({{ $data['withdraw_count'] }})</a>
                                        @endif
                                    @endcan

                                    @can('kyc-action')
                                        @if($data['kyc_count'])
                                            <a href="{{ route('admin.kyc.pending') }}" class="site-btn-xs green-btn"><i
                                                    icon-name="loader" class="spining-icon"></i>{{ __('KYC Requests') }}
                                                ({{ $data['kyc_count'] }})</a>
                                        @endif
                                    @endcan

                                    @can('deposit-action')
                                        @if($data['deposit_count'])
                                            <a href="{{ route('admin.deposit.manual.pending') }}"
                                               class="site-btn-xs primary-btn"><i icon-name="loader"
                                                                                  class="spining-icon"></i>{{ __('Deposit Requests') }}
                                                ({{ $data['deposit_count'] }})</a>
                                        @endif
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @endif
            </div>
            @endcanany

            @include('backend.include.__data_card')


            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Site Statistics') }}</h3>
                                <div class="card-header-links">
                                    <input class="card-header-input" type="text" name="daterange" value="{{ $data['start_date'] .' - '. $data['end_date'] }}" />
                                </div>
                            </div>
                            <div class="site-card-body">
                                <canvas id="depositChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Scheme Statistics') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <canvas id="schemeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Top Country Statistics') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <canvas id="countryChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Best Browser Statistics') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <canvas id="browserChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="site-chart">
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Best OS Statistics') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <canvas id="osChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           @include('backend.include.__latest_user_invest');

        </div>
    </div>
    <!-- Modal for Send Email -->
    @include('backend.user.include.__mail_send')
    <!-- Modal for Send Email-->

@endsection
@section('script')
    @include('backend.include.__chartjs')
    <script>
        (function ($) {
            'use strict';
            //send mail modal form open
            $('.send-mail').on('click', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#name').html(name);
                $('#userId').val(id);
                $('#sendEmail').modal('toggle')
            })
        })(jQuery);
    </script>
@endsection
