@include('client.main.html')
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    @include('client.main.header')
</head>

<body class="body dashboard1">





    <div id="wrapper">
        <div id="page" class="market-page">
            {{-- header --}}
            @include('client.main.head')

            <div class="flat-tabs">
                {{-- sidebar --}}
                @include('client.main.sidebar')

                <div class="content-tabs">

                    <div id="explore"
                        class="tabcontent {{ Route::currentRouteName() == 'client.plan.index' ? 'active' : '' }}">



                        @foreach ($plans as $plan)
                            <div class="content-tab-item m-3 p-3 d-flex flex-column"
                                style="background-color:rgb(54, 46, 46); width:30%;">

                                <h3 class="p-3">{{ $plan->name }}</h3>

                                @if ($plan->discount_price == null)
                                    <p class="p-3">{{ $plan->price }} EGP</p>
                                @else
                                    <del class="p-3" style="font-size: 15px">{{ $plan->price }} EGP</del>
                                    <p class="p-3">{{ $plan->discount_price }} EGP</p>
                                @endif

                                <p class="p-3">{{ $plan->duration }} in weeks</p>
                                <p class="p-3">{{ $plan->description }}</p>

                                {{-- Card --}}
                                <form method="POST" action="{{ route('client.plans.pay', $plan->id) }}"
                                    class="mt-auto text-start">
                                    @csrf
                                    <input type="hidden" name="method" value="card">
                                    <button type="submit">Pay with Visa / MasterCard</button>
                                </form>

                                {{-- Wallet --}}
                                {{-- <form method="POST" action="{{ route('client.plans.pay', $plan->id) }}"
                                    class="mt-2 text-start">
                                    @csrf
                                    <input type="hidden" name="method" value="wallet">

                                    <input type="text" name="wallet_number" placeholder="Wallet number (01xxxxxxxxx)"
                                        style="width:100%; padding:8px; margin-bottom:8px;">

                                    <button type="submit">Pay with Wallet</button>
                                </form> --}}


                            </div>
                        @endforeach




                    </div>

                </div>
            </div>

        </div>
        <!-- /#page -->

        <!-- Modal Popup Bid -->

    </div>
    <!-- /#wrapper -->

    @include('client.main.wrapper')


    <!-- Javascript -->
    @include('client.main.footerjs')

</body>


<!-- Mirrored from themesflat.co/html/open9/market.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Dec 2025 18:04:22 GMT -->

</html>
