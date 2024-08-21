<!DOCTYPE html>
<html lang="en">
@include('frontend.default.include.__head')
<body class="{{ session()->get('site-color-mode') ?? 'dark-theme' }}">
@include('notify::components.notify')
<!--Full Layout-->
<div class="panel-layout">
    <!--Header-->
    @include('frontend::include.__user_header')
    <!--/Header-->

    <div class="desktop-screen-show">
        @include('frontend::include.__user_side_nav')
    </div>

    <div class="page-container">
        <div class="main-content">
            <div class="section-gap">
                <div class="container-fluid">
                    @if(setting('kyc_verification','permission'))
                        {{-- Kyc Info--}}
                        @include('frontend::user.include.__kyc_info')
                        @include('frontend::user.mobile_screen_include.kyc.__user_kyc_mobile')
                    @endif
                    <!--Page Content-->
                    @yield('content')
                    <!--Page Content-->
                </div>
            </div>
        </div>
    </div>


    <!-- Show in 575px in Mobile Screen -->
    <div class="mobile-screen-show">
        @include('frontend::user.mobile_screen_include.__menu')
    </div>

    <!-- Show in 575px in Mobile Screen End -->

    <!-- Automatic Popup -->
    @if(Session::get('signup_bonus'))
        @include('frontend::user.include.__signup_bonus')
    @endif

    <!-- /Automatic Popup End -->
</div>
<!--/Full Layout-->

@include('frontend.default.include.__script')


</body>
</html>

