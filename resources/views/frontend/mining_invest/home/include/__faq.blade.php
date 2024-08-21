@php
    $landingContent =\App\Models\LandingContent::where('type','faq')->where('locale',app()->getLocale())->get();
@endphp
<section class="section-style light-yellow-bg">
    <div class="coins-left" style="background: url({{ asset("frontend/theme_base/money_invest/materials/banners/coin.png") }}) repeat;" data-aos="fade-down-right" data-aos-duration="2000"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="section-title centered">
                    <h4 data-aos="fade-down" data-aos-duration="2000">{{ $data['title_small'] }}</h4>
                    <h2 data-aos="fade-down" data-aos-duration="1500">{{ $data['title_big'] }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($landingContent as $content)
                <div class="col-xl-6 col-12">
                    <div class="faq-contents">
                        <div class="headding">{{ $content->title }}</div>
                        <div class="content">{{ $content->description }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
