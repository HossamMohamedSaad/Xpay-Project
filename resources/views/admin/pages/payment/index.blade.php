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
    <title>Xpay | payment Control</title>
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
                        <a href="{{route('admin.payment.add')}}" class="badge badge-default fw-normal shadow px-2 py-1 mb-2 fst-italic fs-xxs">
                            <i data-lucide="table" class="fs-sm me-1"></i> Add payment
                        </a>
                        <h3 class="fw-bold">
                            payment Section
                        </h3>

                        <p class="fs-md text-muted mb-0">Exportable DataTables For payment</p>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- Start Main Content -->
                



                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        {{-- <a href="{{ route('admin.payment.add') }}" class="btn btn-success">Add payment</a> --}}
                        {{-- <br><br> --}}
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
                                            <th>merchant_order_id</th>
                                            <th>amount_cents</th>
                                            <th>status</th>
                                            <th> Method</th>
                                            <th>success</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $payment)
                                            <tr>
                                                <td>{{ $payment->client->name }}</td>
                                                <td>{{ $payment->plan->name }}</td>
                                                <td>{{ $payment->merchant_order_id }}</td>
                                                <td>{{ $payment->amount_cents }}</td>
                                                <td>{{ $payment->status }}</td>
                                                <td>{{ $payment->payment_method }}</td>
                                                @if ($payment->success == 1)
                                                    <td><span class="badge badge-label badge-soft-success">Active</span></td>
                                                @else
                                                    <td><span class="badge badge-label badge-soft-danger">Not Active</span></td>
                                                @endif

                                                
                                                
                                            </tr>
                                            
                                            
                                        @endforeach
                                        
                                        
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                        {{ $payments->links() }}
                                    </div>
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

    @include('admin.pages.payment.tablejs')
    <script>
        (function () {
        const selectors = [
            '[data-tables="export-data-dropdown"]',
            '[data-tables="export-data"]',
        ];

        function hidePaginationUI(tableEl) {
            // DataTables v1 wrapper + v2 container
            const wrapper =
            tableEl.closest(".dataTables_wrapper") ||
            tableEl.closest(".dt-container") ||
            tableEl.parentElement;

            if (!wrapper) return;

            // v1 classes
            wrapper.querySelectorAll(".dataTables_paginate, .dataTables_info").forEach(el => {
            el.style.display = "none";
            });

            // v2 classes
            wrapper.querySelectorAll(".dt-paging, .dt-info").forEach(el => {
            el.style.display = "none";
            });
        }

        function forceNoPagination(tableEl) {
            try {
            // Wait until it is initialized by your main JS file
            if (!(window.DataTable && DataTable.isDataTable && DataTable.isDataTable(tableEl))) return false;

            const dt = DataTable(tableEl);

            // Show ALL rows (no paging effect)
            if (dt.page && dt.page.len) {
                dt.page.len(-1).draw(false);
            }

            // Hide pagination elements in the DOM
            hidePaginationUI(tableEl);

            return true;
            } catch (e) {
            return false;
            }
        }

        function boot() {
            selectors.forEach(sel => {
            const el = document.querySelector(sel);
            if (!el) return;

            // Poll until DataTables initializes it
            let tries = 0;
            const timer = setInterval(() => {
                tries++;
                const ok = forceNoPagination(el);
                if (ok || tries > 50) clearInterval(timer);
            }, 100);

            // Keep hiding pagination if something re-renders it
            const mo = new MutationObserver(() => {
                hidePaginationUI(el);
            });

            mo.observe(document.body, { childList: true, subtree: true });
            });
        }

        // Run after everything (your main JS included)
        window.addEventListener("load", boot);

        // Extra hard kill: inject CSS from JS
        const style = document.createElement("style");
        style.innerHTML = `
            .dataTables_paginate, .dataTables_info,
            .dt-paging, .dt-info { display: none !important; }
        `;
        document.head.appendChild(style);
        })();
    </script>


</body>



</html>