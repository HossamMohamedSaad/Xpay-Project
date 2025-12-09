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

            <div class="flat-tabs">
                {{-- sidebar --}}
                @include('client.main.sidebar')

                <div class="content-tabs">
                    
                    <div id="explore" class="tabcontent {{ Route::currentRouteName() == 'client.explore.index' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                <div class="action__body w-full mb-40">
                                    <div class="tf-tsparticles">
                                        <div id="tsparticles3" data-color="#161616" data-line="#000"></div>
                                    </div>
                                    <h2>Discover, create and sell your own NFT</h2>
                                    <div class="flat-button flex">
                                        <a href="#" class="tf-button style-2 h50 w190 mr-10">Explore now<i class="icon-arrow-up-right2"></i></a>
                                        <a href="#" class="tf-button style-2 h50 w230">Create your first NFT<i class="icon-arrow-up-right2"></i></a>
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
                                    <h2 class="tf-title pb-30">Explore Product</h2>
                                </div>
                                <div class="widget-tabs relative">
                                    <div class="tf-soft">
                                        <div class="soft-right">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.125 5.625H16.875M3.125 10H16.875M3.125 14.375H10" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                <span>Sort by: recently added</span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <h6>Sort by</h6>
                                                    <a href="#" class="dropdown-item">
                                                        <div class="sort-filter" href="#">
                                                            <span>Recently added</span>
                                                            <span class="icon-tick"><span class="path2"></span></span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <div class="sort-filter active" href="#">
                                                            <span>Price: Low to High</span>
                                                            <span class="icon-tick"><span class="path2"></span></span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <div class="sort-filter" href="#">
                                                            <span>Price: High to Low</span>
                                                            <span class="icon-tick"><span class="path2"></span></span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <div class="sort-filter" href="#">
                                                            <span>Auction ending soon</span>
                                                            <span class="icon-tick"><span class="path2"></span></span>
                                                        </div>
                                                    </a>
        
                                                    <h6>Options</h6>
                                                    <a href="#" class="dropdown-item">
                                                        <div class="sort-filter" href="#">
                                                            <span>Auction ending soon</span>
                                                            <input class="check" type="checkbox" value="checkbox" name="check" checked="">
                                                        </div>
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <div class="sort-filter" href="#">
                                                            <span>Show lazy minted</span>
                                                            <input class="check" type="checkbox" value="checkbox" name="check">
                                                        </div>
                                                    </a>
        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="widget-menu-tab">
                                        <li class="item-title">
                                            <span class="inner">Category</span>
                                        </li>
                                        <li class="item-title active">
                                            <span class="inner">Items</span>
                                        </li>
                                        <li class="item-title">
                                            <span class="inner">Status</span>
                                        </li>
                                        <li class="item-title">
                                            <span class="inner">Price range</span>
                                        </li>
                                    </ul>
                                    <div class="widget-content-tab">
                                        <div class="widget-content-inner">
                                            <div class="wrap-box-card">
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-17.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-18.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-19.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-20.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-21.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-22.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-23.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-24.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-17.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-18.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-19.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-20.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-21.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-22.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-23.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-24.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-inner active">
                                            <div class="wrap-box-card">
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-17.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-18.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-19.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-20.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-21.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-22.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-23.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-24.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-17.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-18.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-19.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-20.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-21.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-22.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-23.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-24.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-inner">
                                            <div class="wrap-box-card">
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-17.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-18.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-19.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-20.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-21.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-22.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-23.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-24.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-17.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-18.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-19.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-20.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-21.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-22.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-23.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-24.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-inner">
                                            <div class="wrap-box-card">
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-17.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-18.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-19.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-20.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-21.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-22.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-23.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-24.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-17.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-18.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-19.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-20.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-01.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-21.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-02.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-22.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-03.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-23.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-item">
                                                    <div class="tf-card-box style-4">
                                                        <div class="author flex items-center">
                                                            <div class="avatar">
                                                                <img src="assets/images/avatar/avatar-box-04.jpg" alt="Image">
                                                            </div>
                                                            <div class="info">
                                                                <span>Created by:</span>
                                                                <h6><a href="author-2.html">Marvin McKinney</a> </h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-media">
                                                            <a href="#">
                                                                <img src="assets/images/box-item/card-item-24.jpg" alt="">
                                                            </a>
                                                            <span class="wishlist-button icon-heart"></span>
                                                        </div>
                                                        <h5 class="name"><a href="nft-detail-2.html">Dayco serpentine belt</a></h5>
                                                        <div class="meta-info flex items-center justify-between">
                                                            <div>
                                                                <span class="text-bid">Current Bid</span>
                                                                <h6 class="price gem"><i class="icon-gem"></i>0,34</h6>
                                                            </div>
                                                            <div class="button-place-bid">
                                                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="tf-button"><span>Place Bid</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="side-bar">
                                <div class="widget widget-recently">
                                    <h5 class="title-widget">Recently added</h5>
                                    <div class="card-small-main">
                                        <img src="assets/images/blog/sidebar-05.jpg" alt="">
                                        <div class="card-bottom">
                                            <h5><a href="#">Photography</a></h5>
                                            <span class="date">16hr ago</span>
                                        </div>
                                    </div>
                                    <div class="card-small">
                                        <div class="author">
                                            <img src="assets/images/blog/sidebar-06.jpg" alt="">
                                            <div class="info">
                                                <h6><a href="#">Propw</a></h6>
                                                <p><a href="#">@themes</a></p>
                                            </div>
                                        </div>
                                        <span class="date">Mon, 08 May </span>
                                    </div>
                                    <div class="card-small">
                                        <div class="author">
                                            <img src="assets/images/blog/sidebar-07.jpg" alt="">
                                            <div class="info">
                                                <h6><a href="#">Propw</a></h6>
                                                <p><a href="#">@themes</a></p>
                                            </div>
                                        </div>
                                        <span class="date">Mon, 08 May </span>
                                    </div>
                                    <div class="card-small">
                                        <div class="author">
                                            <img src="assets/images/blog/sidebar-08.jpg" alt="">
                                            <div class="info">
                                                <h6><a href="#">Propw</a></h6>
                                                <p><a href="#">@themes</a></p>
                                            </div>
                                        </div>
                                        <span class="date">Mon, 08 May </span>
                                    </div>
                                </div>
                                <div class="widget widget-creators">
                                    <div class="flex items-center justify-between">
                                        <h5 class="title-widget">Top Creators</h5>
                                        <a class="see-all" href="#">See all</a>
                                    </div>
                                    <div class="widget-creators-item flex items-center mb-20">
                                        <div class="order">1. </div>
                                        <div class="author flex items-center flex-grow">
                                            <img src="assets/images/avatar/avatar-small-01.png" alt="">
                                            <div class="info">
                                                <h6><a href="#">Brooklyn Simmons</a></h6>
                                                <span><a href="#">@themes</a></span>
                                            </div>
                                        </div>
                                        <button class="follow">Follow</button>
                                    </div>
                                    <div class="widget-creators-item flex items-center mb-20">
                                        <div class="order">2. </div>
                                        <div class="author flex items-center flex-grow">
                                            <img src="assets/images/avatar/avatar-small-02.png" alt="">
                                            <div class="info">
                                                <h6><a href="#">Brooklyn Simmons</a></h6>
                                                <span><a href="#">@themes</a></span>
                                            </div>
                                        </div>
                                        <button class="follow">Follow</button>
                                    </div>
                                    <div class="widget-creators-item flex items-center mb-20">
                                        <div class="order">3. </div>
                                        <div class="author flex items-center flex-grow">
                                            <img src="assets/images/avatar/avatar-small-03.png" alt="">
                                            <div class="info">
                                                <h6><a href="#">Brooklyn Simmons</a></h6>
                                                <span><a href="#">@themes</a></span>
                                            </div>
                                        </div>
                                        <button class="follow">Follow</button>
                                    </div>
                                    <div class="widget-creators-item flex items-center mb-20">
                                        <div class="order">4. </div>
                                        <div class="author flex items-center flex-grow">
                                            <img src="assets/images/avatar/avatar-small-04.png" alt="">
                                            <div class="info">
                                                <h6><a href="#">Brooklyn Simmons</a></h6>
                                                <span><a href="#">@themes</a></span>
                                            </div>
                                        </div>
                                        <button class="follow">Follow</button>
                                    </div>
                                    <div class="widget-creators-item flex items-center">
                                        <div class="order">5. </div>
                                        <div class="author flex items-center flex-grow">
                                            <img src="assets/images/avatar/avatar-small-01.png" alt="">
                                            <div class="info">
                                                <h6><a href="#">Brooklyn Simmons</a></h6>
                                                <span><a href="#">@themes</a></span>
                                            </div>
                                        </div>
                                        <button class="follow">Follow</button>
                                    </div>
                                </div>
                                <div class="widget widget-coins">
                                    <h5 class="title-widget">Trending coins</h5>
                                    <div class="widget-coins-item flex items-center mb-20">
                                        <img src="assets/images/box-icon/coin-01.png" alt="">
                                        <p><a href="#">Bitcoin</a></p>
                                    </div>
                                    <div class="widget-coins-item flex items-center mb-20">
                                        <img src="assets/images/box-icon/coin-02.png" alt="">
                                        <p><a href="#">Ethereum</a></p>
                                    </div>
                                    <div class="widget-coins-item flex items-center mb-20">
                                        <img src="assets/images/box-icon/coin-03.png" alt="">
                                        <p><a href="#">Cardano</a></p>
                                    </div>
                                    <div class="widget-coins-item flex items-center mb-20">
                                        <img src="assets/images/box-icon/coin-04.png" alt="">
                                        <p><a href="#">Solana</a></p>
                                    </div>
                                    <div class="widget-coins-item flex items-center">
                                        <img src="assets/images/box-icon/coin-05.png" alt="">
                                        <p><a href="#">Litecoin</a></p>
                                    </div>
                                </div>
                                <div class="widget widget-history">
                                    <div class="flex items-center justify-between">
                                        <h5 class="title-widget">History</h5>
                                        <a class="see-all" href="#">See all</a>
                                    </div>
                                    <div class="widget-creators-item flex items-center mb-20">
                                        <div class="author flex items-center flex-grow">
                                            <img src="assets/images/avatar/avatar-small-01.png" alt="">
                                            <div class="info">
                                                <h6><a href="#">Lorem NFT sold</a></h6>
                                                <span><a href="#">Sold at 1.32 ETH</a></span>
                                            </div>
                                        </div>
                                        <span class="time">Just now</span>
                                    </div>
                                    <div class="widget-creators-item flex items-center mb-20">
                                        <div class="author flex items-center flex-grow">
                                            <img src="assets/images/avatar/avatar-small-02.png" alt="">
                                            <div class="info">
                                                <h6><a href="#">New NFT uploaded</a></h6>
                                                <span><a href="#">By Marisol Pena</a></span>
                                            </div>
                                        </div>
                                        <span class="time">1hr ago</span>
                                    </div>
                                    <div class="widget-creators-item flex items-center mb-20">
                                        <div class="author flex items-center flex-grow">
                                            <img src="assets/images/avatar/avatar-small-03.png" alt="">
                                            <div class="info">
                                                <h6><a href="#">You followed a creator</a></h6>
                                                <span><a href="#">Jane Cooper</a></span>
                                            </div>
                                        </div>
                                        <span class="time">2hr ago</span>
                                    </div>
                                    <div class="widget-creators-item flex items-center mb-20">
                                        <div class="author flex items-center flex-grow">
                                            <img src="assets/images/avatar/avatar-small-04.png" alt="">
                                            <div class="info">
                                                <h6><a href="#">You placed a bid</a></h6>
                                                <span><a href="#">Whirl wind NFT</a></span>
                                            </div>
                                        </div>
                                        <span class="time">4hr ago</span>
                                    </div>
                                    <div class="widget-creators-item flex items-center">
                                        <div class="author flex items-center flex-grow">
                                            <img src="assets/images/avatar/avatar-small-01.png" alt="">
                                            <div class="info">
                                                <h6><a href="#">You followed a creator</a></h6>
                                                <span><a href="#">Courtney Henry</a></span>
                                            </div>
                                        </div>
                                        <span class="time">16hr ago</span>
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


<!-- Mirrored from themesflat.co/html/open9/market.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Dec 2025 18:04:22 GMT -->
</html>