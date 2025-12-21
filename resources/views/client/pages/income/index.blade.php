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


                    <div id="income" class="tabcontent {{ Route::currentRouteName() == 'client.income.index' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                <div class="action__body w-full mb-40">
                                    <div class="tf-tsparticles">
                                        <div id="ads" data-color="#161616" data-line="#000"></div>
                                    </div>
                                    <h2>Discover, create and edit your Monthly income </h2>
                                    <div class="flat-button flex">
                                        <a href="{{ route('client.income.add') }}"
                                            class="tf-button style-2 h50 w190 mr-10">Add New Income<i
                                                class="icon-arrow-up-right2"></i></a>
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
                                    <h2 class="tf-title pb-30">Incomes </h2>
                                </div>



                                <div class="tf-section-2 product-detail">
                                    <div class="themesflat-container">
                                        <div class="row">
                                            
                                            <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                                <div class="product-item offers">
                                                    <h6><i class="icon-description"></i>Incomes</h6>
                                                    <i class="icon-keyboard_arrow_down"></i>
                                                    <div class="content">
                                                        <div class="table-heading">
                                                            <div class="column">Income source</div>
                                                            <div class="column">Account</div>
                                                            <div class="column">Amount</div>
                                                            <div class="column">Date</div>
                                                            <div class="column">Actions</div>
                                                            
                                                        </div>
                                                        @if ($incomes -> isEmpty())
                                                            
                                                        <div class="column " style="column-span: 100%;">No Incomes</div>
                                                        @else
                                                        @foreach ($incomes as $income  )
                                                            
                                                        <div class="table-item">
                                                            <div class="column"><h6 class="price gem">{{ $income->income_source?->name??'EDIT BY USER' }}</h6></div>
                                                            <div class="column">{{ $income->account?->name }}</div>
                                                            <div class="column">{{ $income->amount }}</div>
                                                            <div class="column">{{ $income->created_at }}</div>
                                                            
                                                            @if ($income->income_source == null)
                                                            
                                                            <div class="column">
                                                                <a href="{{ route('client.income.delete', $income->id) }}" class="btn btn-danger">Delete</a>
                                                                
                                                            </div>
                                                            @else
                                                            
                                                            <div class="column">
                                                                <a href="{{ route('client.income.edit', $income->id) }}" class="btn btn-primary">Edit</a>
                                                                <a href="{{ route('client.income.delete', $income->id) }}" class="btn btn-danger">Delete</a>

                                                            </div>
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