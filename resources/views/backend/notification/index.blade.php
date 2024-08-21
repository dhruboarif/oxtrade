@extends('backend.layouts.app')
@section('title')
    {{ __('All Notifications') }}
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title">{{ __('All Notifications') }}</h2>
                            <a href="{{ route('admin.read-notification', 0) }}" class="title-btn"><i icon-name="check"></i> Mark all read</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-card">
                        <div class="site-card-body">
                            <div class="notification-list">
                                @foreach($notifications as $notification)
                                    <div @class(['single-list', 'read' => $notification->read])>
                                        <div class="cont">
                                            <div class="icon"><i icon-name="{{ $notification->icon }}"></i></div>
                                            <div class="contents">
                                                {{ $notification->notice }}
                                                <div class="time">{{ $notification->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                        <div class="link">
                                            <a href="{{ route('admin.read-notification', $notification->id) }}"
                                               class="site-btn-xs red-btn"><i
                                                    icon-name="external-link"></i>{{ __('Explore') }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{ $notifications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
