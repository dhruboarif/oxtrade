@php
    $landingContent = \App\Models\LandingContent::where('type','howitworks')->where('locale',app()->getLocale())->get();
@endphp

<section class="how-it-works section-style-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <div class="section-title text-center">
                    <h4 data-aos="fade-down" data-aos-duration="2000">{{ $data['title_small'] }}</h4>
                    <h2 data-aos="fade-down" data-aos-duration="1500">
                        {{ $data['title_big'] }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($landingContent as $content)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="how-it-works-single" data-aos="fade-left" data-aos-duration="1000">
                        <div class="icon-box">
                            <img class="icon-box-icon" src="{{ asset($content->icon) }}" alt="">
                        </div>
                        <h4>{{ $content->title }}</h4>
                        <p>
                            {{ $content->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
