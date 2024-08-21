@extends('backend.layouts.app')
@section('title')
    {{ __('Page Settings') }}
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="title-content">
                            <h2 class="title">{{ __('Page Settings') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="site-card">
                        <div class="site-card-header">
                            <h3 class="title">{{ __('Basic Settings') }}</h3>
                        </div>
                        <div class="site-card-body">
                            <form action="{{ route('admin.page.setting.update') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="site-input-groups row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-label">
                                        {{ __('Page Breadcrumb') }}<i icon-name="info" data-bs-toggle="tooltip" title=""
                                                                      data-bs-original-title="All the pages Breadcrumb Background Image"></i>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                                        <div class="wrap-custom-file">
                                            <input type="file" name="breadcrumb" id="breadcrumbBg"
                                                   accept=".gif, .jpg, .png"/>
                                            <label for="breadcrumbBg" class="file-ok"
                                                   style="background-image: url({{ asset(getPageSetting('breadcrumb')) }})">
                                                <img class="upload-icon"
                                                     src="{{ asset('global/materials/upload.svg') }}" alt=""/>
                                                <span>{{ __('Update Background') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit"
                                                class="site-btn-sm primary-btn">{{ __('Save Changes') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="site-card">
                        <div class="site-card-header">
                            <h3 class="title">{{ __('Register Field Settings') }}</h3>
                        </div>
                        <div class="site-card-body">
                            <form action="{{ route('admin.page.setting.update') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="site-input-groups row">
                                    <div class="col-sm-3 col-label">{{ __('Manage Fields for Registration') }}</div>
                                    <div class="col-sm-9">
                                        <div class="form-row">
                                            <div class="col-xl-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label class="box-input-label" for="">{{ __('Username:') }}</label>
                                                    <div class="switch-field">
                                                        <input
                                                            type="radio"
                                                            id="username-show"
                                                            name="username_show"
                                                            @checked( getPageSetting('username_show'))
                                                            value="1"
                                                        />
                                                        <label for="username-show">{{ __('Show') }}</label>
                                                        <input
                                                            type="radio"
                                                            id="username-hide"
                                                            name="username_show"
                                                            @checked(!getPageSetting('username_show'))
                                                            value="0"
                                                        />
                                                        <label for="username-hide">{{ __('Hide') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label class="box-input-label"
                                                           for="">{{ __('Phone Number:') }}</label>
                                                    <div class="switch-field">
                                                        <input
                                                            type="radio"
                                                            id="phone-show"
                                                            name="phone_show"
                                                            @checked(getPageSetting('phone_show'))
                                                            value="1"
                                                        />
                                                        <label for="phone-show">{{ __('Show') }}</label>
                                                        <input
                                                            type="radio"
                                                            id="phone-hide"
                                                            name="phone_show"
                                                            @checked(!getPageSetting('phone_show'))
                                                            value="0"
                                                        />
                                                        <label for="phone-hide">{{ __('Hide') }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label class="box-input-label" for="">{{ __('Country:') }}</label>
                                                    <div class="switch-field">
                                                        <input
                                                            type="radio"
                                                            id="country-show"
                                                            name="country_show"
                                                            @checked( getPageSetting('country_show'))
                                                            value="1"
                                                        />
                                                        <label for="country-show">{{ __('Show') }}</label>
                                                        <input
                                                            type="radio"
                                                            id="country-hide"
                                                            name="country_show"
                                                            @checked( !getPageSetting('country_show'))
                                                            value="0"
                                                        />
                                                        <label for="country-hide">{{ __('Hide') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label class="box-input-label"
                                                           for="">{{ __('Referral Code:') }}</label>
                                                    <div class="switch-field">
                                                        <input
                                                            type="radio"
                                                            id="referral-code-show"
                                                            name="referral_code_show"
                                                            @checked( getPageSetting('referral_code_show'))
                                                            value="1"
                                                        />
                                                        <label for="referral-code-show">{{ __('Show') }}</label>
                                                        <input
                                                            type="radio"
                                                            id="referral-code-hide"
                                                            name="referral_code_show"
                                                            @checked( !getPageSetting('referral_code_show'))
                                                            value="0"
                                                        />
                                                        <label for="referral-code-hide">{{ __('Hide') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit"
                                                class="site-btn-sm primary-btn">{{ __('Save Changes') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
