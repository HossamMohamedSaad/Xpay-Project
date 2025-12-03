<!--
* Author: Coderthemes
* Product Name: Vona
* Version: 1.0.0
* Contact: support@coderthemes.com
-->
<!DOCTYPE html>
<html lang="en">


@include('admin.main.header')
<title>Xpay | Add Plans </title>


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

            <div class="container-fluid">



                <!-- ============================================================== -->
                <!-- Start Main Content -->
                <!-- add_form -->
                <br><br><br>
                <br><br><br>
                <h1>Add Plan</h1>
                <br><br>
                <form action="{{ route('admin.plan.create') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label"> Name</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="example-rounded" class="form-control rounded-pill"
                                        name="name" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="col-md-8">


                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label"> price</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="example-rounded" class="form-control rounded-pill"
                                        name="price" placeholder="price ">
                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        <div class="col-md-8">


                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label">discount price</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="example-rounded" class="form-control rounded-pill"
                                        name="discount_price" placeholder=" discount price">
                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        <div class="col-md-8">


                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label"> description</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="example-rounded" class="form-control rounded-pill"
                                        name="description" placeholder=" description">
                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        <div class="col-md-8">


                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label"> duration</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="example-rounded" class="form-control rounded-pill"
                                        name="duration" placeholder=" duration">
                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        <div class="col-md-8">


                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label"> Active</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible"  checked>

                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        



                    </div>




                   
                    <button type="submit" class="btn btn-success">Add</button>

                    <br><br><br><br>
                    <br><br><br><br>

                </form>

                <!-- ============================================================== -->

            </div>
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