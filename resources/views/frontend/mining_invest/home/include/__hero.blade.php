<!-- Side Socials -->
<div class="side-socials-fixed">
    @foreach($socials as $social)
        <a href="" class="{{ Str::lower($social->icon_name) }}"><i class="{{ $social->class_name }}"></i></a>
    @endforeach
</div>

<!-- Side Socials End -->
<section id="particles-js" class="banner grad-overlay" style="background: url({{ asset('frontend/theme_base/mining_invest/materials/banners/1.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                <div class="banner-content">
                    <h5 class="ann-badge">{{ $data['company_slogan'] ?? '' }}</h5>
                    <h2 data-aos="fade-right" data-aos-duration="1000">{{ $data['hero_title'] }}</h2>
                    <p data-aos="fade-up" data-aos-duration="1500">
                        {{ $data['hero_content'] }}
                    </p>
                    <div class="banner-anchors">
                        <a href="{{ $data['hero_button1_url'] }}" class="site-btn-big black-btn mb-2" data-aos="fade-up" data-aos-duration="2000"><i icon-name="{{ $data['hero_button1_icon'] }}"></i>{{ $data['hero_button1_level'] }}</a>
                        <a href="{{ $data['hero_button2_url'] }}" class="site-btn-big glass-btn" data-aos="fade-up" data-aos-duration="2500"><i icon-name="{{ $data['hero_button2_icon'] }}"></i>{{ $data['hero_button2_lavel'] }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
