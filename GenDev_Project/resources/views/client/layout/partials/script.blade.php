<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/hidemaxlistitem.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/hidemaxlistitem.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/scrollup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/waypoints-sticky.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/pace.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> // SweetAlert2 for alerts(dùng để hiển thị thông báo)
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: {!! json_encode(session('success')) !!},
            showConfirmButton: false,
            timer: 2000
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: {!! json_encode(session('error')) !!},
            showConfirmButton: false,
            timer: 2500
        });
    @endif

    @if (session('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Cảnh báo!',
            text: {!! json_encode(session('warning')) !!},
            showConfirmButton: false,
            timer: 2500
        });
    @endif
</script>
{{-- Custom scripts --}}
@stack('scripts')