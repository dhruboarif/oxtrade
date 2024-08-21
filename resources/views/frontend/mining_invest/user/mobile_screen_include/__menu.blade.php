<div class="bottom-appbar">
    <a href="{{ route('user.dashboard') }}" class="{{ isActive('user.dashboard') }}">
        <i icon-name="layout-dashboard"></i>
    </a>
    <a href="{{ route('user.deposit.amount') }}" class="{{ isActive('user.deposit*') }}">
        <i icon-name="download"></i>
    </a>
    <a href="{{ route('user.schema') }}" class="{{ isActive('user.schema*') }}">
        <i icon-name="box"></i>
    </a>
    <a href="{{ route('user.referral') }}" class="{{ isActive('user.referral*') }}">
        <i icon-name="gift"></i>
    </a>
    <a href="{{ route('user.setting.show') }}" class="{{ isActive('user.setting*') }}">
        <i icon-name="settings"></i>
    </a>
</div>
