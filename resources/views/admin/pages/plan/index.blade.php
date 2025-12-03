<!--
* Author: Coderthemes
* Product Name: Vona
* Version: 1.0.0
* Contact: support@coderthemes.com
-->
<!DOCTYPE html>
<html lang="en">


@include('admin.main.header')
<title>Xpay | Plans controller</title>


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
                    <a href="{{route('admin.plan.add')}}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">Add plan</a>
                    <br><br>
                </div>



                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="fs-xs">
                            <tr>
                                <th> Name</th>
                                <th>price</th>
                                <th>discount price</th>
                                <th>Discreption</th>
                                <th>duration months</th>
                                <th>Status</th>
                                <th>Actions</th>
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
                                <!-- edit modal content -->
                                <div class="modal fade" id="edit-modal{{ $plan->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="scrollableModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Modal Heading</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Edit your plan Data</h5>
                                                {{-- <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p> --}}
                                                <hr>

                                                <form action="{{ route('admin.plan.update') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" name="id" class="form-control rounded-pill"
                                                        value="{{ $plan->id }}">
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
                                                                        placeholder=" Name" value="{{ $plan->name }}">


                                                                </div>
                                                            </div>

                                                            <br>
                                                        </div>
                                                        <div class="col-md-12">

                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">price</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="price"
                                                                        placeholder=" price" value="{{ $plan->price }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">


                                                            <br><br>
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">discount price</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="discount_price"
                                                                        placeholder=" discount price" value="{{ $plan->discount_price }}">
                                                                </div>
                                                            </div>


                                                    
                                                            <br><br>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <br><br>
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">description</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="description"
                                                                        placeholder=" description" value="{{ $plan->description }}">
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <br><br>
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">duration</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="duration"
                                                                        placeholder=" duration by months" value="{{ $plan->duration }}">
                                                                </div>
                                                            </div>                                        
                                                            <br><br>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <br><br>
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                <label for="is_visible" class="col-form-label">Visible</label>

                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" value="1" {{ old('is_visible', $plan->is_visible ?? false) ? 'checked' : '' }}>
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
                                <div id="delete-modal{{ $plan->id }}" class="modal fade" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('admin.plan.destroy') }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name="id" class="form-control rounded-pill"
                                                        value="{{ $plan->id }}">
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
                @include('admin.main.footer')

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