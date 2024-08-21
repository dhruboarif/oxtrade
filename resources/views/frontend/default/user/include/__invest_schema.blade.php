<strong> {{ $schema['name'] }} <i icon-name="arrow-big-right"></i> {{ $currencySymbol.$invest_amount }}</strong>
<div class="date">{{ $created_time }}
    @if($is_cancel && $status == 'ongoing')
        <a href="{{ route('user.invest-cancel',$id) }}"><span class="site-badge grad-btn ms-1"> {{ __('Cancel Now')  }} </span>  </a>
    @endif
<script>
  'use strict';
  lucide.createIcons();
</script>
