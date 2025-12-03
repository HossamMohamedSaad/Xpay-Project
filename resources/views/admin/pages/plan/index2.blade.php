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

                <div>
                    <br><br><br>
                    <a href="{{route('client.create')}}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">Add Client</a>
                    <br><br>
                </div>



                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="fs-xs">
                            <tr>
                                <th> Name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>image</th>
                                {{-- <th>password</th>
                                <th>address</th>
                                <th>gender</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td> {{ $client->name }}</td>
                                    <td> {{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>
                                        @if($client->getFirstMediaUrl('client_images'))
                                            <img src="{{ $client->getFirstMediaUrl('client_images') }}" width="100"
                                                alt="Current Image">
                                        @else
                                            image
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit-modal{{ $client->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal{{ $client->id }}">Delete</button>
                                        <a href="{{route('client.show', $client->id)}}" class="btn btn-success btn-sm"
                                            role="button" aria-pressed="true">Show</a>

                                        {{-- <button class="btn btn-sm btn-primary">Edit</button> --}}
                                        {{-- <button class="btn btn-sm btn-danger">Delete</button> --}}
                                    </td>
                                </tr>
                                <!-- edit modal content -->
                                <div class="modal fade" id="edit-modal{{ $client->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="scrollableModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Modal Heading</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Text in a modal</h5>
                                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                                <hr>

                                                <form action="{{ route('client.update') }}" method="POST"
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
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">Password</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input type="text" id="example-rounded"
                                                                        class="form-control rounded-pill" name="password"
                                                                        placeholder=" password"
                                                                        value="{{ $client->password }}">
                                                                </div>
                                                            </div>


                                                            <br><br>


                                                            <br><br>
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example-textarea"
                                                                        class="col-form-label">Gender</label>
                                                                </div>
                                                                <div class="col-lg-8">

                                                                    <div class="mb-2">
                                                                        @if($client->is_male == '1')
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="is_male" id="is_male" value="1"
                                                                                    checked>
                                                                                <label class="form-check-label" for="male">
                                                                                    male</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="is_male" id="is_male" value="0">
                                                                                <label class="form-check-label" for="female">
                                                                                    female</label>
                                                                            </div>
                                                                        @else
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="is_male" id="male" value="1">
                                                                                <label class="form-check-label" for="male">
                                                                                    male</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="is_male" id="is_male" value="0"
                                                                                    checked>
                                                                                <label class="form-check-label" for="female">
                                                                                    female</label>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <br><br>
                                                        </div>
                                                        <br><br><br><br>
                                                        <div class="col-md-12">
                                                            <div class="row g-lg-4 g-2">
                                                                <div class="col-lg-4">
                                                                    <label for="example" class="col-form-label">Drag
                                                                        Image</label>
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <input name="image" type="file" id="example">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row g-lg-4 g-2">
                                                            <div class="col-lg-4">
                                                                <label for="example-textarea"
                                                                    class="col-form-label">country</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="example-rounded"
                                                                    class="form-control rounded-pill" name="country"
                                                                    placeholder=" country"
                                                                    value="{{ $client->address?->first()?->country }}">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row g-lg-4 g-2">
                                                            <div class="col-lg-4">
                                                                <label for="example-textarea"
                                                                    class="col-form-label">city</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="example-rounded"
                                                                    class="form-control rounded-pill" name="city"
                                                                    placeholder=" city"
                                                                    value="{{ $client->address?->first()?->city }}">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row g-lg-4 g-2">
                                                            <div class="col-lg-4">
                                                                <label for="example-textarea"
                                                                    class="col-form-label">zone</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="example-rounded"
                                                                    class="form-control rounded-pill" name="zone"
                                                                    placeholder=" zone"
                                                                    value="{{ $client->address?->first()?->zone }}">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row g-lg-4 g-2">
                                                            <div class="col-lg-4">
                                                                <label for="example-textarea"
                                                                    class="col-form-label">street</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="example-rounded"
                                                                    class="form-control rounded-pill" name="street"
                                                                    placeholder=" street"
                                                                    value="{{ $client->address?->first()?->street }}">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row g-lg-4 g-2">
                                                            <div class="col-lg-4">
                                                                <label for="example-textarea"
                                                                    class="col-form-label">bulding</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="example-rounded"
                                                                    class="form-control rounded-pill" name="bulding"
                                                                    placeholder=" bulding"
                                                                    value="{{ $client->address?->first()?->bulding }}">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row g-lg-4 g-2">
                                                            <div class="col-lg-4">
                                                                <label for="example-textarea"
                                                                    class="col-form-label">floor</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="example-rounded"
                                                                    class="form-control rounded-pill" name="floor"
                                                                    placeholder=" floor"
                                                                    value="{{ $client->address?->first()?->floor }}">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row g-lg-4 g-2">
                                                            <div class="col-lg-4">
                                                                <label for="example-textarea"
                                                                    class="col-form-label">department</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="example-rounded"
                                                                    class="form-control rounded-pill" name="department"
                                                                    placeholder=" department"
                                                                    value="{{ $client->address?->first()?->department }}">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row g-lg-4 g-2">
                                                            <div class="col-lg-4">
                                                                <label for="example-textarea"
                                                                    class="col-form-label">gate</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="example-rounded"
                                                                    class="form-control rounded-pill" name="gate"
                                                                    placeholder=" gate"
                                                                    value="{{ $client->address?->first()?->gate }}">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row g-lg-4 g-2">
                                                            <div class="col-lg-4">
                                                                <label for="example-textarea"
                                                                    class="col-form-label">postal_code</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="example-rounded"
                                                                    class="form-control rounded-pill" name="postal_code"
                                                                    placeholder=" postal_code"
                                                                    value="{{ $client->address?->first()?->postal_code }}">
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row g-lg-4 g-2">
                                                            <div class="col-lg-4">
                                                                <label for="example-textarea"
                                                                    class="col-form-label">description</label>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="example-rounded"
                                                                    class="form-control rounded-pill" name="description"
                                                                    placeholder=" description"
                                                                    value="{{ $client->address?->first()?->description }}">
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
                                <!-- delete modal content -->
                                <div id="delete-modal{{ $client->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Modal Heading</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Text in a modal</h5>
                                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                                <hr>
                                                <form action="{{ route('client.destroy') }}" method="POST">
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
                @include('admin.main.footer')

            </div>
        </div>
    </div>
    @include('admin.main.theme_setting')
    @include('admin.main.footerjs')

</body>

</html>