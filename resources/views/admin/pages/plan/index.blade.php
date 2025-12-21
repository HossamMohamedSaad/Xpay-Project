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
    <title>Xpay | Plans Control</title>
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



                <!-- ============================================================== -->
                <!-- Start Main Content -->

               

                <div class="row justify-content-center py-5">
                    <div class="col-xxl-5 col-xl-7 text-center">
                        <a href="{{route('admin.plan.add')}}" class="badge badge-default fw-normal shadow px-2 py-1 mb-2 fst-italic fs-xxs">
                            <i data-lucide="table" class="fs-sm me-1"></i> Add plan
                        </a>
                        <h3 class="fw-bold">
                            Plans Section
                        </h3>

                        <p class="fs-md text-muted mb-0">You can add and edit and show your plans here.</p>
                    </div>
                </div>


                

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h5 class="card-title"> Clients Table </h5>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0">
                                        <thead class="fs-xs">
                                            <tr>
                                                <th width="10%"> Name</th>
                                                <th width="10%">price</th>
                                                <th width="10%">discount price</th>
                                                <th width="30%">Discreption</th>
                                                <th width="10%">duration months</th>
                                                <th width="10%">Status</th>
                                                <th width="20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plans as $plan)
                                                <tr>
                                                    <td> {{ $plan->name }}</td>
                                                    <td> {{ $plan->price }}</td>
                                                    <td>{{ $plan->discount_price }}</td>
                                                    <td>{{ $plan->description }}</td>
                                                    <td>{{ $plan->duration }}</td>
                                                    @if ($plan->is_visible == true) 
                                                        <td>{{ 'visible' }}</td>
                                                    @else
                                                        <td>{{ "not visible" }}</td>                                        
                                                    @endif
                                                    
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#edit-modal{{ $plan->id }}">Edit</button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete-modal{{ $plan->id }}">Delete</button>
                                                        {{-- <a href="{{route('plan.show', $plan->id)}}" class="btn btn-success btn-sm"
                                                            role="button" aria-pressed="true">Show</a> --}}
                                                    </td>
                                                </tr>
                                            @include('admin.pages.plan.editmodal')
                                            @include('admin.pages.plan.deletemodal') 
                                                
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