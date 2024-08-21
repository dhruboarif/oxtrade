@extends('frontend::layouts.user')
@section('title')
    {{ __('All Notifications') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h3 class="title">{{ __('All Notifications') }}</h3>
                </div>
                <div class="site-card-body">
                    <div class="notification-list">
                        @foreach($notifications as $notification)
                            <div @class(['single-list', 'read' => $notification->read ])>
                                <div class="cont">
                                    <div class="icon"><i icon-name="{{ $notification->icon }}"></i></div>
                                    <div class="contents">
                                        {{ $notification->notice }}
                                        <div class="time"> {{ $notification->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                <div class="link">
                                    <a href="{{ route('user.read-notification', $notification->id) }}"
                                       class="site-btn-sm red-btn"><i icon-name="external-link"></i>{{ __('Explore') }}
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    {{ $notifications->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
