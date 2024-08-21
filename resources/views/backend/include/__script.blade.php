<script src="{{ asset('global/js/jquery.min.js') }}"></script>
<script src="{{ asset('global/js/jquery-migrate.js') }}"></script>
<script src="{{ asset('backend/js/jquery-ui.js') }}"></script>

<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('backend/js/scrollUp.min.js') }}"></script>
<script src="{{ asset('global/js/waypoints.min.js') }}"></script>
<script src="{{asset('global/js/jquery.counterup.min.js')}}"></script>
<script src="{{ asset('backend/js/chart.js') }}"></script>
<script src="{{ asset('global/js/lucide.min.js') }}"></script>
<script src="{{ asset('global/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('global/js/datatables.min.js') }}" type="text/javascript" charset="utf8"></script>
<script src="{{ asset('global/js/moment.min.js') }}"></script>
<script src="{{ asset('global/js/daterangepicker.min.js') }}"></script>

<script src="{{ asset('global/js/simple-notify.min.js') }}"></script>
<script src="{{ asset('backend/js/summernote-lite.min.js') }}"></script>
<script src="{{ asset('global/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/js/main.js?var=5') }}"></script>
<script src="{{ asset('global/js/pusher.min.js') }}"></script>
<script src="{{ asset('global/js/custom.js?var=6') }}"></script>

@include('global.__notification_script',['for'=>'admin','userId' => ''])
@notifyJs
@yield('script')
@stack('single-script')


