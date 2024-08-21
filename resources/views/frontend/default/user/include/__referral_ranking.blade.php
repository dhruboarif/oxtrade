<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="user-ranking" @if($user->avatar) style="background: url({{ asset($user->avatar) }});" @endif>
            @if($user->ranking_id == 0)
                <h4>0</h4>
            @else
            <h4>{{ $user->rank->ranking }}</h4>
            @endif
            @if($user->ranking_id == 0)
              <p>Not Rank yet</p>
            @else
            <p>{{ $user->rank->ranking_name }}</p>
            @endif
            
            @if($user->ranking_id == 0)
               <div class="rank" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                <img src="" alt="">
            </div>
            @else
           <div class="rank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->rank->description }}">
                <img src="{{ asset( $user->rank->icon) }}" alt="">
            </div>
            @endif
            
        </div>
    </div>
    @if(setting('sign_up_referral','permission'))
        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h3 class="title">{{ __('Referral URL') }}</h3>
                </div>
                <div class="site-card-body">
                    <div class="referral-link">
                        <div class="referral-link-form">
                            <input type="text" value="{{ $referral->link }}" id="refLink"/>
                            <button type="submit" onclick="copyRef()">
                                <i class="anticon anticon-copy"></i>
                                <span id="copy">{{ __('Copy') }}</span>
                            </button>
                        </div>
                        <p class="referral-joined">
                            {{ $referral->relationships()->count() }} {{ __('peoples are joined by using this URL') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
