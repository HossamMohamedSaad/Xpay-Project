<!--
* Author: Coderthemes
* Product Name: Vona
* Version: 1.0.0
* Contact: support@coderthemes.com
-->
<!DOCTYPE html>
<html lang="en">


@include('admin.main.header')
<title>Xpay | Add Clients</title>


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
                <h1>Add client</h1>
                <br><br>
                <form action="{{ route('admin.client.create') }}" method="POST" enctype="multipart/form-data">
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
                                        name="name" placeholder="Name" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="col-md-8">


                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label"> email</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="example-rounded" class="form-control rounded-pill"
                                        name="email" placeholder="email" value="{{ old('email') }}">
                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        <div class="col-md-8">


                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label"> password</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="password" id="example-rounded" class="form-control rounded-pill"
                                        name="password" placeholder="password "  value="{{ old('password') }}">
                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        <div class="col-md-8">


                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label"> phone</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="example-rounded" class="form-control rounded-pill"
                                        name="phone" placeholder="  phone" value="{{ old('phone') }}">
                                </div>
                            </div>

                        </div>
                        <br><br><br>
                        <div class="col-md-8">


                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label"> plan</label>
                                </div>
                                <div class="col-lg-8">
                                    <select id="example-rounded" class="form-select rounded-pill"  name="plan">
                                        @foreach ($plans as $plan)
                                            <option value="{{ $plan->id }}" >{{ $plan->name }}</option>                                        
                                        @endforeach
                                    </select>
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
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"  checked>

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