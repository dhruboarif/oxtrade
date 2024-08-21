<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-4 col-12">
                <div class="header-top-announcement">
                    <i class="fa-solid fa-bullhorn"></i>{{ __('Get') }} {{ setting('signup_bonus','fee') .' '. $currency }} {{ __('Bonus by') }} 👋<a href="{{ route('register') }}" class="link">{{ __('Signing Up') }}</a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-sm-8 col-12">
                <div class="header-top-phone">
                    <p><i class="{{ $socials->first()->class_name }}"></i><a href="{{ url($socials->first()->url) }}">{{ $socials->first()->icon_name }}</a></p>
                    <p><i class="fa-regular fa-envelope"></i><a href="">{{ setting('support_email','global')}}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<header class="header">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">

            <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset(setting('site_logo','global')) }}"
                                                                  alt=""/></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0 main-nav">
                    @foreach($navigations as $navigation)
                        @if($navigation->page->status|| $navigation->page_id == null)
                            <li class="nav-item">
                                <a class="nav-link @if(url($navigation->url) == Request::url() ) active @endif"
                                   href="{{ url($navigation->url) }}">{{ $navigation->tname }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="header-right-btn">
                    <select name="language" id="" class="language-nice-select site-nice-select"
                            onchange="window.location.href=this.options[this.selectedIndex].value;">
                        @foreach(\App\Models\Language::where('status',true)->get() as $lang)
                            <option
                                value="{{ route('language-update',['name'=> $lang->locale]) }}" @selected( app()->getLocale() == $lang->locale )>{{$lang->name}}</option>
                        @endforeach
                    </select>

                    @auth('web')
                        <a href="{{route('user.dashboard')}}" class="site-btn-sm grad-btn ms-3"><i
                                class="anticon anticon-dashboard"></i>{{ __('Dashboard') }}</a>

                    @else
                        <a href="{{route('login')}}" class="site-btn-sm grad-btn ms-3"><i icon-name="user"></i>{{ __('Account') }}</a>

                    @endauth

                </div>
            </div>
        </div>
    </nav>
</header>
