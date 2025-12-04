<!--
* Author: Coderthemes
* Product Name: Vona
* Version: 1.0.0
* Contact: support@coderthemes.com
-->
<!DOCTYPE html>
<html lang="en">


<head>
    @include('admin.main.header')
    <title>Xpay | user Control</title>
</head>


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

                <div class="row justify-content-center py-5">
                    <div class="col-xxl-5 col-xl-7 text-center">
                        <a href="{{route('admin.user.add')}}" class="badge badge-default fw-normal shadow px-2 py-1 mb-2 fst-italic fs-xxs">
                            <i data-lucide="table" class="fs-sm me-1"></i> Add Users
                        </a>
                        <h3 class="fw-bold">
                            Users Section
                        </h3>

                        <p class="fs-md text-muted mb-0">You can add and edet and show your users here.</p>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- Start Main Content -->

                



                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h5 class="card-title"> Users Table </h5>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0">
                                        <thead class="fs-xs">
                                            <tr>
                                                <th> Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td> {{ $user->name }}</td>
                                                    <td> {{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>                                    
                                                    
                                                    
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#edit-modal{{ $user->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete-modal{{ $user->id }}">Delete</button>
                                                        
                                                        
                                                    </td>
                                                </tr>
                                                @include('admin.pages.user.editmodal')
                                                @include('admin.pages.user.deletemodal')
                                                
                                                
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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