<!doctype html>
<html lang="en">

@include('layouts.head')

<body>

    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        {{-- @include('layouts.main') --}}

        <!--start content-->
        <main class="page-content">
            <div class="content-wrapper">
                <section class="content pt-3">
                    @yield('container')
                </section>
            </div>
        </main>
        <!--end page main-->

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; SMK Negeri 69 Jakarta</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    @include('layouts.foot')
</body>

</html>
