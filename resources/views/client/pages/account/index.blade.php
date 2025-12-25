@include('client.main.html')
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    @include('client.main.header')
</head>

<body class="body dashboard1">

    <!-- preload -->
    {{-- <div class="preload preload-container">
        <div class="middle">
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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

            <div class="flat-tabs">
                {{-- sidebar --}}
                @include('client.main.sidebar')

                <div class="content-tabs">

                    <div id="account"
                        class="tabcontent {{ Route::currentRouteName() == 'client.account.index' ? 'active' : '' }} ">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                <div class="action__body w-full mb-40">
                                    <div class="tf-tsparticles">
                                        <div id="tsparticles1" data-color="#161616" data-line="#000"></div>
                                    </div>
                                    <h2 style="font-size: 25px;">Add and Edit your account</h2>
                                    <div class="flat-button flex" style="flex-direction: row-reverse;">

                                        <a href="{{ route('client.account.add') }}"
                                            class="tf-button style-2 h50 w190 mr-10">Add New Account<i
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
                                    <h2 class="tf-title pb-30">Your Accounts</h2>
                                </div>
                                <div class="widget-tabs relative">
                                    
                                    
                                    <div class="widget-content-tab">
                                        <div class="widget-content-inner">
                                            <div class="wrap-box-card">
                                                @foreach ($accounts as $account )
                                                    
                                                <div class="col-item">
                                                    <div class="tf-card-box style-1">
                                                        
                                                        <h5 class="name">{{ $account->name }}</h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <span class="text-bid">Current</span>
                                                            <h6 class="price gem">${{ $account->amount }}</h6>
                                                        </div>
                                                        <div class="divider p-1" style="margin-top: 5px; margin-bottom: 10px;"></div>
                                                        <div class="d-flex gap-2 " style="" >
                                                            <form action="{{ route('client.account.delete') }}" method="POST"style="margin-right: 10px">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $account->id }}">
                                                                <button type="submit"style="background-color: #cb2e2e; border-radius: 50%; padding: 13.5px;" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                            </form>

                                                            <form action="{{ route('client.account.edit') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $account->id }}">
                                    
                                                                <button type="submit" style="border-radius: 50%; padding: 13.5px;"><i class="fa-regular fa-pen-to-square"></i></button>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                                

                                            </div>

                                            @if ($accountd != null)
                                                
                                            <div class="heading-section">
                                                <h2 class="tf-title pb-30">Your Default Accounts</h2>
                                            </div>

                                            <div class="wrap-box-card">
                                                    
                                                <div class="col-item">
                                                    <div class="tf-card-box style-1">
                                                        
                                                        <h5 class="name">{{ $accountd->name }}</h5>
                                                        
                                                        
                                                        <div class="divider"></div>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <span class="text-bid">Current</span>
                                                            <h6 class="price gem">${{ $accountd->amount }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                

                                            </div>
                                                
                                            @endif

                                        </div>
                                        








                                        
                                    </div>
                                </div>

                            </div>
                            {{-- @include('client.main.leftside') --}}

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


<!-- Mirrored from themesflat.co/html/open9/market.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Dec 2025 18:04:22 GMT -->

</html>