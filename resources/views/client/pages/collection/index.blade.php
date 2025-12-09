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
                    
                    <div id="tf-collection" class="tabcontent {{ Route::currentRouteName() == 'client.collection.index' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                <div class="action__body w-full mb-40">
                                    <div class="tf-tsparticles">
                                        <div id="tsparticles4" data-color="#161616" data-line="#000"></div>
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
                                <div class="add-new-collection mb-40">
                                    <div class="w-full">
                                        <h6><i class="icon-add"></i> Add new collection</h6>
                                        <p>create and store the best collections of NFTs</p>
                                    </div>
                                    <a href="#" class="tf-button style-1 w174 h50">Create<i class="icon-arrow-up-right2"></i></a>
                                </div>
                                <div class="heading-section">
                                    <h2 class="tf-title pb-20">China collection</h2>
                                </div>
                                <div class="top-collections style-bottom mb-40">
                                    <div class="featured pt-10 swiper-container carousel3-type1" data-swiper='{
                                        "loop":false,
                                        "slidesPerView": 1,
                                        "spaceBetween": 25,
                                        "observer": true,
                                        "observeParents": true,
                                        "navigation": {
                                            "clickable": true,
                                            "nextEl": ".next-type1",
                                            "prevEl": ".prev-type1"
                                        },
                                        "pagination": {
                                            "el": ".pagination-type1",
                                            "clickable": true
                                        },
                                        "breakpoints": {
                                            "768": {
                                                "slidesPerView": 2
                                            },
                                            "1024": {
                                                "slidesPerView": 3
                                            }
                                        }
                                    }'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination pagination-type1"></div>
                                        <div class="swiper-button-next next-type1"></div>
                                        <div class="swiper-button-prev prev-type1"></div>
                                    </div>
                                </div>
                                <div class="heading-section">
                                    <h2 class="tf-title style-1 pb-20">Themesflat collection</h2>
                                </div>
                                <div class="top-collections style-bottom mb-40">
                                    <div class="featured pt-10 swiper-container carousel3-type1" data-swiper='{
                                        "loop":false,
                                        "slidesPerView": 1,
                                        "spaceBetween": 25,
                                        "observer": true,
                                        "observeParents": true,
                                        "navigation": {
                                            "clickable": true,
                                            "nextEl": ".next-type1",
                                            "prevEl": ".prev-type1"
                                        },
                                        "pagination": {
                                            "el": ".pagination-type1",
                                            "clickable": true
                                        },
                                        "breakpoints": {
                                            "768": {
                                                "slidesPerView": 2
                                            },
                                            "1024": {
                                                "slidesPerView": 3
                                            }
                                        }
                                    }'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination pagination-type1"></div>
                                        <div class="swiper-button-next next-type1"></div>
                                        <div class="swiper-button-prev prev-type1"></div>
                                    </div>
                                </div>
                                <div class="heading-section">
                                    <h2 class="tf-title style-1 pb-20">My collection</h2>
                                </div>
                                <div class="top-collections style-bottom">
                                    <div class="featured pt-10 swiper-container carousel3-type1" data-swiper='{
                                        "loop":false,
                                        "slidesPerView": 1,
                                        "spaceBetween": 25,
                                        "observer": true,
                                        "observeParents": true,
                                        "navigation": {
                                            "clickable": true,
                                            "nextEl": ".next-type1",
                                            "prevEl": ".prev-type1"
                                        },
                                        "pagination": {
                                            "el": ".pagination-type1",
                                            "clickable": true
                                        },
                                        "breakpoints": {
                                            "768": {
                                                "slidesPerView": 2
                                            },
                                            "1024": {
                                                "slidesPerView": 3
                                            }
                                        }
                                    }'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="tf-card-collection">
                                                    <a href="author-2.html">
                                                        <div class="media-images-collection">
                                                            <img src="assets/images/box-item/img-collection-01.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-02.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-03.jpg" alt="">
                                                            <img src="assets/images/box-item/img-collection-04.jpg" alt="">
                                                            <div class="author-poster">
                                                                <img src="assets/images/avatar/avatar-01.png" alt="" class="w-full">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card-bottom">
                                                        <div class="author">
                                                            <h5><a href="author-1.html">Bored ape#21</a></h5>
                                                            <div class="infor">@Themesflat</div>
                                                        </div>
                                                        <div class="bottom-right">
                                                            <div class="shop"> 
                                                                <div class="icon">
                                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.875 6.25L16.3542 15.11C16.3261 15.5875 16.1166 16.0363 15.7685 16.3644C15.4204 16.6925 14.96 16.8752 14.4817 16.875H5.51833C5.03997 16.8752 4.57962 16.6925 4.23152 16.3644C3.88342 16.0363 3.6739 15.5875 3.64583 15.11L3.125 6.25M8.33333 9.375H11.6667M2.8125 6.25H17.1875C17.705 6.25 18.125 5.83 18.125 5.3125V4.0625C18.125 3.545 17.705 3.125 17.1875 3.125H2.8125C2.295 3.125 1.875 3.545 1.875 4.0625V5.3125C1.875 5.83 2.295 6.25 2.8125 6.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <p>12 Item</p>
                                                            </div>
                                                            <div class="like">
                                                                <span class="wishlist-button icon-heart"></span>
                                                                <p>97 like</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination pagination-type1"></div>
                                        <div class="swiper-button-next next-type1"></div>
                                        <div class="swiper-button-prev prev-type1"></div>
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