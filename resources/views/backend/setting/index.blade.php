@extends('backend.layouts.app')
@section('title')
    {{ __('setting') }}
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <h2 class="title">@yield('setting-title')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-tab-bars">
                        <ul>
                            @can('site-setting')
                                <li class="{{ isActive('admin.settings.site') }}">
                                    <a href="{{ route('admin.settings.site') }}"><i
                                            icon-name="settings"></i>{{ __('Site Settings') }}</a>
                                </li>
                            @endcan

                            @can('email-setting')
                                <li class="{{ isActive('admin.settings.mail') }}">
                                    <a href="{{ route('admin.settings.mail') }}"><i
                                            icon-name="mail"></i>{{ __('Email Settings') }}</a>
                                </li>
                            @endcan

                            @can('plugin-setting')

                                <li class="{{ isActive('admin.settings.plugin','system') }} ">
                                    <a href="{{ route('admin.settings.plugin','system') }}"><i
                                            icon-name="award"></i>{{__('Plugin Settings') }}</a>
                                </li>
                                <li class="{{ isActive('admin.settings.plugin','sms') }} ">
                                    <a href="{{ route('admin.settings.plugin','sms') }}"><i
                                            icon-name="message-circle"></i>{{__('SMS Settings') }}</a>
                                </li>
                                <li class="{{ isActive('admin.settings.plugin','notification') ?? isActive('admin.settings.notification.tune') }} ">
                                    <a href="{{ route('admin.settings.plugin','notification') }}"><i
                                            icon-name="bell-ring"></i>{{__('Notification Settings') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                    <div class="row">
                        @yield('setting-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
