@include('client.main.html')
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    @include('client.main.header')
</head>

<body class="body dashboard1">

    <!-- preload -->
    {{-- <div class="preload preload-container">
        <div class="middle">[]
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
            <div class="bar bar3"></div>
            <div class="bar bar4"></div>
            <div class="bar bar5"></div>
            <div class="bar bar6"></div>
            <div class="bar bar7"></div>
            <div class="bar bar8"></div>
        </div>
    </div> --}}
    <!-- /preload -->



    <div id="wrapper">
        <div id="page" class="market-page">
            {{-- header --}}
            @include('client.main.head')

            <div class="flat-tabs">
                {{-- sidebar --}}
                @include('client.main.sidebar')

                <div class="content-tabs">


                    <div id="expense" class="tabcontent {{ Route::currentRouteName() == 'client.report.index' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                <div class="action__body w-full mb-40">
                                    <div class="tf-tsparticles">
                                        <div id="ads" data-color="#161616" data-line="#000"></div>
                                    </div>
                                    <h2>Discover, create and edit your expense </h2>
                                    <div class="flat-button flex">
                                        
                                                <a class="tf-button style-2 h50 w190 mr-10"
                                                    href="{{ route('client.report.export', request()->query()) }}">
                                                    Export Excel
                                                    <i class="icon-arrow-up-right2"></i></a>
                                    </div>
                                    <div class="bg-home7">
                                        <div class="swiper-container autoslider3reverse" data-swiper='{
                                        "loop":true,
                                        "slidesPerView": "auto",
                                        "spaceBetween": 14,
                                        "direction": "vertical",
                                        "speed": 10000,
                                        "observer": true,
                                        "observeParents": true,
                                        "autoplay": {
                                            "delay": "0",
                                            "disableOnInteraction": false
                                        }
                                    }'>
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="assets/images/item-background/bg-action-1.png" alt="">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="assets/images/item-background/bg-action-1.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-container autoslider4reverse" data-swiper='{
                                        "loop":true,
                                        "slidesPerView": "auto",
                                        "spaceBetween": 14,
                                        "direction": "vertical",
                                        "speed": 10000,
                                        "observer": true,
                                        "observeParents": true,
                                        "autoplay": {
                                            "delay": "0",
                                            "disableOnInteraction": false,
                                            "reverseDirection": true
                                        }
                                    }'>
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="assets/images/item-background/bg-action-1.png" alt="">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="assets/images/item-background/bg-action-1.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-container autoslider3reverse" data-swiper='{
                                        "loop":true,
                                        "slidesPerView": "auto",
                                        "spaceBetween": 14,
                                        "direction": "vertical",
                                        "speed": 10000,
                                        "observer": true,
                                        "observeParents": true,
                                        "autoplay": {
                                            "delay": "0",
                                            "disableOnInteraction": false
                                        }
                                    }'>
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="assets/images/item-background/bg-action-1.png" alt="">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="assets/images/item-background/bg-action-1.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading-section">
                                    <h2 class="tf-title pb-30">Report </h2>
                                </div>



                                <div class="tf-section-2 product-detail">
                                    <div class="themesflat-container">
                                        <div class="row">
                                            <form method="GET" action="{{ url()->current() }}" class="d-flex gap-2 mb-3">
                                                <input type="date" name="from" value="{{ request('from') }}"  class="form-control">
                                                <input type="date" name="to" value="{{ request('to') }}"  class="form-control">
                                                <button class="btn btn-primary m-3 p-3  " style="width: 100px; "  type="submit">Filter</button>
                                                <a class="btn btn-warning m-3 " style="width: 100px ; padding-top: 16px;" href="{{ url()->current() }}">Reset</a>
                                            </form>
                                            
                                            <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                                <div class="product-item offers">
                                                    <h6><i class="icon-description"></i>Report</h6>
                                                    <i class="icon-keyboard_arrow_down"></i>
                                                    <div class="content">
                                                        <div class="table-heading">
                                                            <div class="column"> source</div>
                                                            <div class="column">Account</div>
                                                            <div class="column">Amount</div>
                                                            <div class="column">Date</div>
                                                            {{-- <div class="column"> type</div> --}}
                                                            {{-- @dd($rows) --}}
                                                        </div>
                                                        @if ($rows == Null)
                                                            
                                                        <div class="column " style="column-span: 100%;">No Data</div>
                                                        @else
                                                            
                                                        @foreach ($rows as $row  )
                                                            
                                                        <div class="table-item">
                                                            @if (is_null($row->source_id))
                                                                <div class="column"><h6 class="price gem">EDIT BY USER</h6></div>
                                                            @else
                                                                <div class="column"><h6 class="price gem">{{ $row->source_name }}</h6></div>
                                                            @endif
                                                            
                                                            <div class="column">{{ $row->account_name ?? '-' }}</div>
                                                            <div class="column"> {{ $row->amount }} EGP</div>
                                                            <div class="column">{{ \Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i')  }}</div>
                                    
                                                            @if($row->type === 'income')
                                                                <span class="badge bg-success " style="font-size:12px ;">Income</span>
                                                            @else
                                                                <span class="badge bg-danger" style="font-size:12px ;">Expense</span>
                                                            @endif
                                                                                                                   
                                                            
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
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


</html>