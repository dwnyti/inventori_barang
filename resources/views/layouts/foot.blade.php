<!-- jQuery -->
<script src="{{ asset('assets/admin_lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/admin_lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/admin_lte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin_lte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
{{-- <script src="{{ asset("assets/admin_lte/plugins/jqvmap/jquery.vmap.min.js") }}"></script> --}}
{{-- <script src="{{ asset("assets/admin_lte/plugins/jqvmap/maps/jquery.vmap.usa.js") }}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/admin_lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/admin_lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin_lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/admin_lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('assets/admin_lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin_lte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin_lte/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/admin_lte/dist/js/pages/dashboard.js') }}"></script>
<!-- Bootstrap Js -->
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- JQUERY -->
<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<!-- Sweet Alert -->
<script src="{{ asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<!-- Data Table -->
<script src="{{ asset('assets/dataTables/datatables.min.js') }}"></script>
{{-- AXIOS --}}
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    // SWAL WITH TIMER SUCCESS
    function swalTimerSuccess(title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: "success",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        }).then(() => {
            location.reload();
        });
    }

    // SWALL WITH TIMER ERROR
    function swalTimerError(title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: "error",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
    }

    // FUNCTION HAPUS CRUD
    function hapus(url, name) {
        Swal.fire({
            title: `Apakah Anda Yakin?`,
            text: `Anda tidak akan bisa memulihkan data ${name} ini setelah dihapus.`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#aaa",
            confirmButtonText: "Hapus"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            swalTimerSuccess("Berhasil Dihapus!", `Data ${name} ini akan dihapus.`,
                                "success")
                        } else {
                            swalTimerError("Eror", `Gagal menghapus data ${name} ini.`, "error")
                        }
                    },
                    error: function() {
                        swalTimerError("Eror", error, "error")
                    }
                });
            }
        });
    }
</script>

@stack('scripts')
