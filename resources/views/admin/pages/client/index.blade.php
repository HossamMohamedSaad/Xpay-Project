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
    <title>Xpay | Client Control</title>
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
                        <a href="{{route('admin.client.add')}}" class="badge badge-default fw-normal shadow px-2 py-1 mb-2 fst-italic fs-xxs">
                            <i data-lucide="table" class="fs-sm me-1"></i> Add Client
                        </a>
                        <h3 class="fw-bold">
                            Clients Section
                        </h3>

                        <p class="fs-md text-muted mb-0">You can add and edit and show your Clients here.</p>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- Start Main Content -->

                

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h5 class="card-title"> Clients Table </h5>
                            </div>

                            <div class="card-body"></div>

                                <div class="table-responsive ">
                                    <table class="table align-middle ms-2">
                                        <thead class="fs-xs">
                                            <tr>
                                                <th> Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>plan</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                                <tr >
                                                    <td> {{ $client->name }}</td>
                                                    <td> {{ $client->email }}</td>
                                                    <td>{{ $client->phone }}</td>                                    
                                                    <td>{{ $client->subscribtion?->last()?->plan?->name }}</td>                                    
                                                    @if ($client->is_blocked == true) 
                                                        <td>{{ 'Blocked' }}</td>
                                                    @else
                                                        <td>{{ "Not blocked" }}</td>                                        
                                                    @endif
                                                    
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#edit-modal{{ $client->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete-modal{{ $client->id }}">Delete</button>
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#show-modal{{ $client->id }}">Show</button>
                                                        
                                                    </td>
                                                </tr>
                                                @include('admin.pages.client.editmodal')
                                                @include('admin.pages.client.showmodal')
                                                @include('admin.pages.client.deletemodal')
                                                
                                                
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