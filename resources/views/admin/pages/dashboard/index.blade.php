<!--
* Author: Coderthemes
* Product Name: Vona
* Version: 1.0.0
* Contact: support@coderthemes.com
-->
<!DOCTYPE html>
<html lang="en">


@include('admin.main.header')
<title>Xpay | Dashboard</title>


<body>
    <!-- Begin page -->
    <div class="wrapper">


        @include('admin.main.Topbar')


        <!-- Sidenav Menu Start -->

        @include('admin.main.sidebar')

        <div class="content-page">

            <!-- ============================================================== -->
            <!-- Start Main Content -->
            <!-- ============================================================== -->

            @include('admin.main.main_content')
            <!-- ============================================================== -->
            <!-- End of Main Content -->
            <!-- ============================================================== -->

            <!-- Footer Start -->
            @include('admin.main.footer')
            <!-- end Footer -->

        </div>
    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    @include('admin.main.theme_setting')

    @include('admin.main.footerjs')

</body>



</html>