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


                    <div id="expense" class="tabcontent {{ Route::currentRouteName() == 'client.expense.index' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                <div class="action__body w-full mb-40">
                                    <div class="tf-tsparticles">
                                        <div id="ads" data-color="#161616" data-line="#000"></div>
                                    </div>
                                    <h2 style="font-size: 25px;">Discover, create and edit your expense </h2>
                                    <div class="flat-button flex" style="flex-direction: row-reverse;">
                                        <a href="{{ route('client.expense.add') }}"
                                            class="tf-button style-2 h50 w190 mr-10">Add New expense<i
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
                                    <h2 class="tf-title pb-30">Expenses </h2>
                                </div>



                                <div class="tf-section-2 product-detail">
                                    <div class="themesflat-container">
                                        <div class="row">
                                            
                                            <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                                <div class="product-item offers">
                                                    <h6><i class="icon-description"></i>Expenses</h6>
                                                    <i class="icon-keyboard_arrow_down"></i>
                                                    <div class="content">
                                                        <div class="table-heading">
                                                            <div class="column">expense source</div>
                                                            <div class="column">Account</div>
                                                            <div class="column">Amount</div>
                                                            <div class="column">Date</div>
                                                            <div class="column">Description</div>
                                                            <div class="column">Actions</div>
                                                            
                                                        </div>
                                                        @if ($expenses->isEmpty())
                                                        <div class="column " style="column-span: 100%;">No Expenses</div>
                                                        @else
                                                            
                                                        @foreach ($expenses as $expense  )
                                                            
                                                        <div class="table-item">
                                                            @if ($expense->expense_category == null)
                                                                
                                                                <div class="column"><h6 class="price gem">EDIT BY USER</h6></div>
                                                            @else
                                                                <div class="column"><h6 class="price gem">{{ $expense->expense_category?->name }}</h6></div>
                                                                
                                                            @endif
                                                            <div class="column">{{ $expense->account?->name }}</div>
                                                            <div class="column">{{ $expense->amount }}</div>
                                                            <div class="column">{{ $expense->created_at }}</div>
                                                            <div class="column">{{ $expense->description }}</div>
                                                             @if ($expense->expense_category == null)
                                                                
                                                             <div class="column">
                                                                 <a href="{{ route('client.expense.delete', $expense->id) }}" class="btn btn-danger">Delete</a>
                                                             </div>
                                                            @else
                                                                
                                                            <div class="column">

                                                                <a href="{{ route('client.expense.edit', $expense->id) }}" class="btn btn-primary">Edit</a>
                                                                <a href="{{ route('client.expense.delete', $expense->id) }}" class="btn btn-danger">Delete</a>
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