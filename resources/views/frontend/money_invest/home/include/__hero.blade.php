<section class="banner bubble-ani-left bubble-ani-right" style="background: url({{ asset('frontend/theme_base/money_invest/materials/banners/2.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12 col-12">
                <div class="banner-content">
                    <h5 class="ann-badge">{{ $data['company_slogan'] ?? '' }}</h5>
                    <h2 data-aos="fade-right" data-aos-duration="1000">{{ $data['hero_title'] }}</h2>
                    <p data-aos="fade-up" data-aos-duration="1500">
                        {{ $data['hero_content'] }}
                    </p>
                    <div class="banner-anchors">
                        <a href="{{ $data['hero_button1_url'] }}" class="site-btn-big grad-btn mb-2" data-aos="fade-up" data-aos-duration="2000"><i icon-name="{{ $data['hero_button1_icon'] }}"></i>{{ $data['hero_button1_level'] }}</a>
                        <a href="{{ $data['hero_button2_url'] }}" class="btn-link" data-aos="fade-up" data-aos-duration="2500">{{ $data['hero_button2_lavel'] }}<i icon-name="{{ $data['hero_button2_icon'] }}"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                <div class="banner-right">
                    <img src="{{ asset($data['hero_right_img']) }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="hero-bg-alimation">
        <ul class="box">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</section>
