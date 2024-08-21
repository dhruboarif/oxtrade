<div class="col-xl-6 col-lg-12 col-md-12 col-12">
    <div class="site-card">
        <div class="site-card-header">
            <h3 class="title">{{$fields['title']}}</h3>
        </div>
        <div class="site-card-body">

            @include('backend.setting.site_setting.include.form.__open_action')

            @foreach( $fields['elements'] as $key => $field)
                @if($field['type'] == 'file')
                    <div class="site-input-groups row">
                        <div
                            class="col-xl-4 col-lg-4 col-md-3 col-12 col-label"
                        >
                            {{ __($field['label']) }}
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-9 col-12">
                            <div class="wrap-custom-file {{ $errors->has($field['name']) ? 'has-error' : '' }}">
                                <input
                                    type="{{$field['type']}}"
                                    name="{{$field['name']}}"
                                    id="{{$field['name']}}"
                                    value="{{ oldSetting($field['name'],$section) }}"
                                    accept=".jpeg, .jpg, .png"
                                />
                                <label for="{{ __($field['name']) }}" class="file-ok"
                                       style="background-image: url( {{asset(oldSetting($field['name'],$section)) }} )">
                                    <img
                                        class="upload-icon"
                                        src="{{ asset('global/materials/upload.svg') }}"
                                        alt=""
                                    />
                                    <span>{{ __('upload') .' '.__($field['label'])}} </span>
                                </label>
                            </div>
                        </div>
                    </div>
                @elseif($field['type'] == 'switch')
                    <div class="site-input-groups row">
                        <label for="" class="col-sm-4 col-label">{{ __($field['label']) }}</label>

                        <div class="col-sm-8">
                            <div class="form-switch ps-0">
                                <div class="switch-field same-type m-0">
                                    <input
                                        type="radio"
                                        id="active1-{{$key}}"
                                        class="site-currency-type"
                                        name="{{$field['name']}}"
                                        value="fiat"
                                        @checked(oldSetting($field['name'],$section) == 'fiat')
                                    />
                                    <label for="active1-{{$key}}">{{ __('Fiat') }}</label>
                                    <input
                                        type="radio"
                                        id="disable0-{{$key}}"
                                        name="{{$field['name']}}"
                                        class="site-currency-type"
                                        value="crypto"
                                        @checked(oldSetting($field['name'],$section) == 'crypto')
                                    />
                                    <label for="disable0-{{$key}}">{{ __('Crypto') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($field['type'] == 'dropdown')
                    <div class="site-input-groups row">
                        <label for="" class="col-sm-4 col-label">{{ __($field['label']) }}</label>
                        <div class="col-sm-8">


                            @if($field['name'] == 'site_currency')

                                <div class="currency-fiat">
                                    <select name="" class="form-select site-currency-fiat" id="">
                                        @if(setting('site_currency_type','global') == 'fiat')
                                            <option selected value="{{ oldSetting($field['name'],$section) }}"> {{ oldSetting($field['name'],$section) }}
                                            </option>
                                        @endif
                                    </select>
                                </div>


                                <div class="currency-crypto">
                                    <select name="" class="form-select site-currency-crypto" id="">
                                        @if(setting('site_currency_type','global') == 'crypto')
                                            <option selected value="{{ oldSetting($field['name'],$section) }}"> {{ oldSetting($field['name'],$section) }}
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            @endif

                            @if($field['name'] == 'site_timezone')
                                <select name="{{$field['name']}}" class="form-select site-timezone" id="">
                                    <option selected value="{{ oldSetting($field['name'],$section) }}"> {{ oldSetting($field['name'],$section) }}
                                    </option>
                                </select>
                            @endif

                            @if($field['name'] == 'site_referral')
                                <select name="{{$field['name']}}" class="form-select" id="">
                                @foreach(['level','target'] as $type)
                                    <option @selected(oldSetting($field['name'],$section) == $type)
                                            value="{{$type}}"> {{ ucwords($type) .' '.__('Base') }}
                                    </option>
                                @endforeach
                                </select>
                            @endif

                            @if($field['name'] == 'home_redirect')
                                <select name="{{$field['name']}}" class="form-select" id="">
                                <option @selected(oldSetting($field['name'],$section) == '/')
                                        value="/"> {{ __('Home Page') }}
                                </option>
                                @foreach($pages as $page)
                                    @if($page->status)
                                        <option @selected(oldSetting($field['name'],$section) == $page->url)
                                                value="{{$page->url}}"> {{ ucwords($page->title) .' '. __('Page')  }}
                                        </option>
                                    @endif
                                @endforeach
                                </select>
                            @endif

                        </div>
                    </div>
                @else
                    <div class="site-input-groups row">
                        <label for="" class="col-sm-4 col-label">{{ __($field['label']) }}</label>
                        <div class="col-sm-8">
                            <div class="input-group joint-input">

                                <input
                                    type="{{$field['type']}}"
                                    name="{{$field['name']}}"
                                    class=" form-control {{ $errors->has($field['name']) ? 'has-error' : '' }}"
                                    value="{{ oldSetting($field['name'],$section) }}"
                                />

                                @if($field['data'] == 'double')
                                    <span class="input-group-text"> {{ setting('site_currency','global') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            @include('backend.setting.site_setting.include.form.__close_action')
        </div>
    </div>
</div>

