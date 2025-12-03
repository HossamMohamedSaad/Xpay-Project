<!DOCTYPE html>
@include('admin.main.html')

<head>

    @include('admin.main.header')
    <title>Empty page</title>

</head>

<body>
    <div class="wrapper">
        @include('admin.main.topbar')
        @include('admin.main.sidebar')
        <div class="content-page">
            <div class="container-fluid">



                <!-- ============================================================== -->
                <!-- Start Main Content -->
                <!-- add_form -->

                <br><br><br><br><br><br><br><br>
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
                        <br><br><br><br>
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
                        <br><br><br><br>
                        <div class="col-md-8">


                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label for="example-rounded" class="col-form-label">discount price</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="password" id="example-rounded" class="form-control rounded-pill"
                                        name="discount_price" placeholder=" discount price">
                                </div>
                            </div>

                        </div>
                        <br><br><br><br>
                        



                    </div>




                    <br><br>
                    <button type="submit" class="btn btn-success">Add</button>

                    <br><br><br><br>
                    <br><br><br><br>

                </form>

                <!-- ============================================================== -->
                @include('admin.main.footer')

            </div>
        </div>
    </div>
    @include('admin.main.theme_setting')
    @include('admin.main.footerjs')

</body>

</html>