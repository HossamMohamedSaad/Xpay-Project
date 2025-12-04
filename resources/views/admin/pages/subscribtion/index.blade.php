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
    <!-- Datatables css -->
    <link href="{{ asset('admin/assets/plugins/datatables/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css">
    <title>Xpay | Subscribtion Control</title>
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
                        
                        <h3 class="fw-bold">
                            Exportable DataTables For Subscribtion
                        </h3>

                        {{-- <p class="fs-md text-muted mb-0">
                            Enable export options like CSV, Excel, PDF, and print using Subscribtion extensions for
                            seamless data sharing.
                        </p> --}}
                    </div>
                </div>



                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <a href="{{ route('admin.subscribtion.add') }}" class="btn btn-success">Add Subscribtion</a>
                        <br><br>
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h5 class="card-title"> Export Data with Dropdowns </h5>
                                {{-- <a href="https://datatables.net/reference/button/" target="_blank"
                                    class="icon-link icon-link-hover link-primary fw-semibold">View Docs <i
                                        class="ti ti-arrow-right bi align-middle fs-lg"></i></a> --}}
                            </div>

                            <div class="card-body">
                                
                                <table data-tables="export-data-dropdown" class="table table-striped align-middle mb-0">
                                    <thead class="thead-sm text-uppercase fs-xxs">
                                        <tr>
                                            <th>Client</th>
                                            <th>Plan</th>
                                            <th>Start At</th>
                                            <th>End At</th>
                                            <th>Price Paid</th>
                                            <th> Method</th>
                                            <th>Active</th>
                                            <th>Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscriptions as $subscription)
                                            <tr>
                                                <td>{{ $subscription->client->name }}</td>
                                                <td>{{ $subscription->plan->name }}</td>
                                                <td>{{ $subscription->start_date }}</td>
                                                <td>{{ $subscription->end_date }}</td>
                                                <td>{{ $subscription->price_paid }}</td>
                                                <td>{{ $subscription->payment_method }}</td>
                                                @if ($subscription->is_active == 1)
                                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                                @else
                                                    <td><span class="badge badge-label badge-soft-danger">Not Active</span></td>
                                                @endif

                                                @if ($subscription->is_cancelled == 0)
                                                    <td><span class="badge badge-label badge-soft-success">Not Cancelled</span></td>
                                                @else
                                                    <td><span class="badge badge-label badge-soft-danger">Cancelled</span></td>
                                                @endif
                                                
                                            </tr>
                                            
                                            
                                        @endforeach
                                        
                                        
                                    </tbody>
                                </table>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
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

    @include('admin.pages.subscribtion.tablejs')


</body>



</html>