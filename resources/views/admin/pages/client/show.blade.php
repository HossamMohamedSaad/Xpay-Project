<!DOCTYPE html>
@include('admin.main.html')

<head>

    @include('admin.main.header')
<title>Xpay | Clients Details</title>

</head>

<body>
    <div class="wrapper">
        @include('admin.main.topbar')
        @include('admin.main.sidebar')
        <div class="content-page">
            <div class="container-fluid">



                <!-- ============================================================== -->
                <!-- Start Main Content -->





                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="fs-xs">
                            <tr>
                                <th> Name</th>
                                <th>email</th>
                                <th>password</th>
                                <th>image</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{ $client->name }}</td>
                                <td> {{ $client->email }}</td>
                                <td>{{ $client->password }}</td>
                                <td>
                                    @if($client->getFirstMediaUrl('client_images'))
                                        <img src="{{ $client->getFirstMediaUrl('client_images') }}" width="100"
                                            alt="Current Image">
                                    @else
                                        image
                                    @endif
                                </td>


                            </tr>
                        </tbody>
                    </table>

                    <table class="table align-middle mb-0">
                        <thead class="fs-xs">
                            <tr>
                                <th>phone</th>
                                <th>gender</th>
                                <th>address</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $client->phone }}</td>
                                @if($client->is_male == '1')
                                    <td>{{ "Male" }}</td>
                                @else
                                    <td>{{ "female" }}</td>
                                @endif
                                @foreach ($client->address as $add)

                                    <td>{{ $add->description }}</td>
                                @endforeach


                            </tr>
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