<!--
* Author: Coderthemes
* Product Name: Vona
* Version: 1.0.0
* Contact: support@coderthemes.com
-->
<!DOCTYPE html>
<html lang="en">


@include('admin.main.header')
<title>Xpay | Clients controller</title>


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

                <div>
                    <br><br><br>
                    <a href="{{route('admin.client.add')}}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">Add client</a>
                    <br><br>
                </div>



                <div class="table-responsive">
                    <table class="table align-middle mb-0">
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
                                <tr>
                                    <td> {{ $client->name }}</td>
                                    <td> {{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>                                    
                                    <td>{{ $client->subscribtion?->first()?->plan?->name }}</td>                                    
                                    @if ($client->is_active == true) 
                                        <td>{{ 'active' }}</td>
                                    @else
                                        <td>{{ "not active" }}</td>                                        
                                    @endif
                                    
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit-modal{{ $client->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal{{ $client->id }}">Delete</button>
                                        <a href="{{route('admin.client.show', $client->id)}}" class="btn btn-success btn-sm"
                                            role="button" aria-pressed="true">Show</a>
                                    </td>
                                </tr>
                                <!-- edit modal content -->
                                <div class="modal fade" id="edit-modal{{ $client->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="scrollableModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Editing Modal</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Edit your client Data</h5>
                                                {{-- <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p> --}}
                                                <hr>

                                                <form action="{{ route('admin.client.update') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" name="id" class="form-control rounded-pill"
                                                        value="{{ $client->id }}">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-rounded" class="col-form-label">
                                                                        Name</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="name"
                                                                        placeholder=" Name" value="{{ $client->name }}">


                                                                </div>
                                                            </div>

                                                            <br>
                                                        </div>
                                                        <div class="col-md-12">

                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">Email</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="email"
                                                                        placeholder=" email" value="{{ $client->email }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">


                                                            <br><br>
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">Phone</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="phone"
                                                                        placeholder=" phone" value="{{ $client->phone }}">
                                                                </div>
                                                            </div>


                                                    
                                                            <br><br>
                                                        </div>
                                                        <div class="col-md-12">                                                    
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-rounded"
                                                                        class="col-form-label">Plan</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <select id="example-rounded" class="form-select rounded-pill"  name="plan">
                                                                        @foreach ($plans as $plan)
                                                                            <option value="{{ $plan->id }}"
                                                                                {{ $plan->id == $client->subscribtion?->first()?->plan_id ? 'selected' : '' }}>{{ $plan->name }}</option>

                                                                            
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>


                                                    
                                                            <br><br>
                                                        </div>                                                                                               
                                                        <div class="col-md-12">
                                                            
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                <label for="is_active" class="col-form-label">Active</label>

                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $client->is_active ?? false) ? 'checked' : '' }}>
                                                                </div>
                                                            </div>                                        
                                                            <br><br>
                                                        </div>
                                                        <br>

                                      
                                                    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div><!-- /.modal -->
                                <!-- delete modal content -->
                                <div id="delete-modal{{ $client->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Are You Want To Delete It</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Press Delete. </h5>
                                                <p>If you delete it you will not be able to recover it</p>
                                                {{-- <hr> --}}
                                                <form action="{{ route('admin.client.destroy') }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name="id" class="form-control rounded-pill"
                                                        value="{{ $client->id }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"> Delete</button>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endforeach
                        </tbody>
                    </table>
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