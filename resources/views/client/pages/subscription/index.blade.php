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


                    <div id="month_income" class="tabcontent {{ Route::currentRouteName() == 'client.subscription.index' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                <div class="action__body w-full mb-40">
                                    <div class="tf-tsparticles">
                                        <div id="ads" data-color="#161616" data-line="#000"></div>
                                    </div>
                                    <h2 style="font-size: 25px;">Discover, create and edit your Monthly income sourses</h2>
                                    <div class="flat-button flex" style="flex-direction: row-reverse;">
                                        <a href="{{ route('client.plan.index') }}"
                                            class="tf-button style-2 h50 w190 mr-10">Add New subscription<i
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
                                    <h2 class="tf-title pb-30" >Subscriptions</h2>
                                </div>



                                <div class="tf-section-2 product-detail">
                                    <div class="themesflat-container">
                                        <div class="row">
                                            
                                            <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                                <div class="product-item offers">
                                                    <h6><i class="icon-description"></i>Subscriptions</h6>
                                                    <i class="icon-keyboard_arrow_down"></i>
                                                    <div class="content">
                                                        <div class="table-heading">
                                                            <div class="column">Plan</div>
                                                            <div class="column">Start</div>
                                                            <div class="column">End</div>
                                                            <div class="column">Preice</div>
                                                            <div class="column">Active</div>
                                                            <div class="column">Canceled</div>
                                                            <div class="column">Actions</div>
                                                            
                                                        </div>
                                                        @foreach ($subscriptions as $subscription  )
                                                            
                                                        <div class="table-item">
                                                            <div class="column"><h6 class="price gem">{{ $subscription->plan?->name }}</h6></div>
                                                            <div class="column">{{ $subscription->start_date }}</div>
                                                            <div class="column">{{ $subscription->end_date }}</div>
                                                            <div class="column">{{ $subscription->price }} {{ "EGP" }}</div>
                                                            @if ($subscription->is_active)
                                                                
                                                                <div class="column">Active</div>
                                                                @else
                                                                <div class="column">Deactive</div>
                                                                
                                                            @endif
                                                            @if ($subscription->is_cancelled)
                                                                
                                                                <div class="column">Canceled</div>
                                                                @else
                                                                <div class="column">Not Canceled</div>
                                                            @endif
                                                            <div class="column">
                                                                @if ($subscription->is_active)                                                                    
                                                                    <a href="{{ route('client.subscription.cancel', $subscription->id) }}" class="btn btn-danger">Cancel</a>
                                                                @endif
                                                            </div>
                                                            
                                                        </div>
                                                        @endforeach
                                                        
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