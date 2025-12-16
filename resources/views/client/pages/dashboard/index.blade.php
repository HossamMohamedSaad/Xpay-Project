@include('client.main.html')
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    @include('client.main.header')
    <style>
        .parent_category {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    /* grid-template-rows: repeat(12, 1fr); */
    grid-column-gap: 2px;
    grid-row-gap: 2px;
    }
    
    .incomes { grid-area: 2 / 1 / 6 / 7; margin: 1px ; padding: 1px; }
    .expenses { grid-area: 2 / 7 / 6 / 13; margin: 1px ; padding: 1px;}
    .account { grid-area: 6 / 1 / 10 / 7; margin: 1px ; padding: 1px;}
    .transactions { grid-area: 6 / 7 / 10 / 13; margin: 1px ; padding: 1px;}
    .income_resource { grid-area: 10 / 7 / 13 / 13; margin: 1px ; padding: 1px;}
    .expense_category { grid-area: 10 / 1 / 13 / 7; margin: 1px ; padding: 1px;}
    .div7 { grid-area: 1 / 1 / 2 / 5; }
    .div8 { grid-area: 1 / 5 / 2 / 9; }
    .div9 { grid-area: 1 / 9 / 2 / 13; }

    </style>
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


                    <div id="dashboard"
                        class="tabcontent {{ Route::currentRouteName() == 'client.dashboard.index' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                {{-- <div class="action__body w-full mb-40">
                                    <div class="tf-tsparticles">
                                        <div id="ads" data-color="#161616" data-line="#000"></div>
                                    </div>
                                    <h2>Discover, create and edit your dashboard </h2>
                                    <div class="flat-button flex">
                                        <a href="{{ route('client.expense_category.add') }}"
                                            class="tf-button style-2 h50 w190 mr-10">Add New Sourse<i
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
                                </div> --}}
                                <div class="heading-section">
                                    <h2 class="tf-title pb-30">Dashboard</h2>
                                </div>



                                <div class="tf-section-2 product-detail">
                                    <div class="themesflat-container">
                                        <div class="parent_category">


                                            <div class="div7">
                                                <div class="col-item m-2">
                                                    <div class="box-wallet">
                                                        <h6>Total balance</h6>
                                                        <p>the Total balance is :{{ $total_balance }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="div8">
                                                <div class="col-item m-2" >
                                                    <div class="box-wallet">
                                                        <h6>Total incomes</h6>
                                                        <p>the Total balance is :{{ $total_income }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="div9">
                                                <div class="col-item m-2">
                                                    <div class="box-wallet">
                                                        <h6>Total expenses</h6>
                                                        <p>the Total balance is :{{ $total_expense }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="incomes">
                                                <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                            <div class="product-item offers">
                                                <h6><i class="icon-description"></i><a href="{{ route('client.income.index') }}">Incomes</a></h6>
                                                <i class="icon-keyboard_arrow_down"></i>
                                                <div class="content">
                                                    <div class="table-heading">
                                                        <div class="column">Income source</div>
                                                        <div class="column">Account</div>
                                                        <div class="column">Amount</div>
                                                        <div class="column">Date</div>
                                                        {{-- <div class="column">Actions</div> --}}
                                                        
                                                    </div>
                                                    @if ($incomes == Null)
                                                        
                                                    <div class="column " style="column-span: 100%;">No Incomes</div>
                                                    @else
                                                    @foreach ($incomes as $income  )
                                                        
                                                    <div class="table-item">
                                                        <div class="column"><h6 class="price gem">{{ $income->income_source?->name }}</h6></div>
                                                        <div class="column">{{ $income->account?->name }}</div>
                                                        <div class="column">{{ $income->amount }}</div>
                                                        <div class="column">{{ $income->created_at }}</div>
                                                        {{-- <div class="column">
                                                            <a href="{{ route('client.income.edit', $income->id) }}" class="btn btn-primary">Edit</a>
                                                            <a href="{{ route('client.income.delete', $income->id) }}" class="btn btn-danger">Delete</a>
                                                        </div> --}}
                                                        
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                            <div class="expenses">
                                                <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                            <div class="product-item offers">
                                                <h6><i class="icon-description"></i><a href="{{ route('client.expense.index') }}">Expenses</a></h6>
                                                <i class="icon-keyboard_arrow_down"></i>
                                                <div class="content">
                                                    <div class="table-heading">
                                                        <div class="column">expense source</div>
                                                        <div class="column">Account</div>
                                                        <div class="column">Amount</div>
                                                        <div class="column">Date</div>
                                                        {{-- <div class="column">Actions</div> --}}
                                                        
                                                    </div>
                                                    @if ($expenses == Null)
                                                        
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
                                                         {{-- @if ($expense->expense_category == null)
                                                            
                                                         <div class="column">
                                                             <a href="{{ route('client.expense.delete', $expense->id) }}" class="btn btn-danger">Delete</a>
                                                         </div>
                                                        @else
                                                            
                                                        <div class="column">

                                                            <a href="{{ route('client.expense.edit', $expense->id) }}" class="btn btn-primary">Edit</a>
                                                            <a href="{{ route('client.expense.delete', $expense->id) }}" class="btn btn-danger">Delete</a>
                                                        </div>
                                                        @endif --}}
                                                        
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>

                                            </div>
                                            <div class="account">
                                                <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                            <div class="product-item offers">
                                                <h6><i class="icon-description"></i><a href="{{ route('client.account.index') }}">Accounts</a></h6>
                                                <i class="icon-keyboard_arrow_down"></i>
                                                <div class="content">
                                                    <div class="table-heading">
                                                        <div class="column">Name</div>
                                                        <div class="column">Amount</div>
                                                        
                                                    </div>
                                                    @foreach ($accounts as $account  )
                                                        
                                                    <div class="table-item">
                                                        <div class="column">{{ $account->name }}</h6></div>
                                                        <div class="column">{{ $account->amount }}</h6></div>
                                                        
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>

                                            </div>
                                            <div class="transactions"> 
                                                <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                            <div class="product-item offers">
                                                <h6><i class="icon-description"></i><a href="{{ route('client.transaction.index') }}">Transactions</a></h6>
                                                <i class="icon-keyboard_arrow_down"></i>
                                                <div class="content">
                                                    <div class="table-heading">
                                                        <div class="column">From</div>
                                                        <div class="column">To</div>
                                                        <div class="column">Amount</div>
                                                        <div class="column">Short Discreption</div>
                                                        
                                                    </div>
                                                    @foreach ($transactions as $transaction  )
                                                        
                                                    <div class="table-item">
                                                        <div class="column">{{ $transaction->from?->name }}</h6></div>
                                                        <div class="column">{{ $transaction->to?->name }}</h6></div>
                                                        <div class="column">{{ $transaction->amount }}</h6></div>
                                                        <div class="column">{{ $transaction->short_description }}</h6></div>
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>

                                            </div>
                                            <div class="income_resource"> 
                                                <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                            <div class="product-item offers">
                                                <h6><i class="icon-description"></i><a href="{{ route('client.income_source.index') }}">Income Resource</a></h6>
                                                <i class="icon-keyboard_arrow_down"></i>
                                                <div class="content">
                                                    <div class="table-heading">
                                                        <div class="column">Name</div>
                                                        <div class="column">Description</div>
                                                        {{-- <div class="column">Actions</div> --}}
                                                        
                                                    </div>
                                                    @foreach ($sources as $source  )
                                                        
                                                    <div class="table-item">
                                                        <div class="column"><h6 class="price gem">{{ $source->name }}</h6></div>
                                                        <div class="column">{{ $source->description }}</div>
                                                        {{-- <div class="column">
                                                            <a href="{{ route('client.income_source.edit', $source->id) }}" class="btn btn-primary">Edit</a>
                                                            <a href="{{ route('client.income_source.delete', $source->id) }}" class="btn btn-danger">Delete</a>
                                                        </div> --}}
                                                        
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>

                                            </div>
                                            <div class="expense_category"> 
                                                <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                            <div class="product-item offers">
                                                <h6><i class="icon-description"></i><a href="{{ route('client.expense_category.index') }}">Expense Category</a></h6>
                                                <i class="icon-keyboard_arrow_down"></i>
                                                <div class="content">
                                                    <div class="table-heading">
                                                        <div class="column">Name</div>
                                                        <div class="column">Description</div>
                                                        {{-- <div class="column">Actions</div> --}}
                                                        
                                                    </div>
                                                    @foreach ($sources as $source  )
                                                        
                                                    <div class="table-item">
                                                        <div class="column"><h6 class="price gem">{{ $source->name }}</h6></div>
                                                        <div class="column">{{ $source->description }}</div>
                                                        {{-- <div class="column">
                                                            <a href="{{ route('client.expense_category.edit', $source->id) }}" class="btn btn-primary">Edit</a>
                                                            <a href="{{ route('client.expense_category.delete', $source->id) }}" class="btn btn-danger">Delete</a>
                                                        </div> --}}
                                                        
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