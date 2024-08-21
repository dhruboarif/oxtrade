@php
    $landingContent =\App\Models\LandingContent::where('type','counter')->where('locale',app()->getLocale())->get();
@endphp
<section class="section-style-2 grad-bg-5">
    <div class="container">
        <div class="row justify-content-center">

            @foreach($landingContent as $content)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="single-stat" data-aos="fade-down" data-aos-duration="1000">
                        <img src="{{ asset($content->icon) }}" alt=""/>
                        <h3 class="count">{{ $content->description }}</h3>
                        <h4>{{ $content->title }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
