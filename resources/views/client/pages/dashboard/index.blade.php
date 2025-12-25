@include('client.main.html')
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    @include('client.main.header')
    <style>
    
    .parent_category2 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: 1fr;
        grid-column-gap: 0px;
        grid-row-gap: 0px;
        }

    .div21 { grid-area: 1 / 1 / 2 / 2; }
    .div22 { grid-area: 1 / 2 / 2 / 3; }

    .parent_category3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: 1fr;
        grid-column-gap: 0px;
        grid-row-gap: 0px;
        }

    .div31 { grid-area: 1 / 1 / 2 / 2; }
    .div32 { grid-area: 1 / 2 / 2 / 3; }
    .div33 { grid-area: 1 / 3 / 2 / 4; }
   
    
    </style>
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


                    <div id="dashboard"
                        class="tabcontent {{ Route::currentRouteName() == 'client.dashboard.index' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                
                                <div class="heading-section">
                                    <h2 class="tf-title pb-30">Dashboard</h2>
                                </div>



                                <div class="tf-section-2 product-detail">
                                    <div class="themesflat-container">

                                        <div class="parent_category2">
                                            <div class="div21">
                                                <div class="col-item m-2" >
                                                    <div class="box-wallet">
                                                        <h6> Incomes in {{ $month }} /{{ $year }}</h6>
                                                        <p>the Total balance is :{{ $total_income }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="div22">
                                                <div class="col-item m-2">
                                                    <div class="box-wallet">
                                                        <h6> Expenses in {{ $month }} /{{ $year }}</h6>
                                                        <p>the Total balance is :{{ $total_expense }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="parent_category2">
                                            <div class="div21">
                                                <div class="col-item m-2">
                                                    <div class="box-wallet">
                                                        <h6> Balance in {{ $month }} /{{ $year }}</h6>
                                                        <p>the Total balance is :{{ $total_income - $total_expense }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="div22">
                                                <div class="col-item m-2">
                                                    <div class="box-wallet">
                                                        <h6>Total balance</h6>
                                                        <p>the Total balance is :{{ $total_balance }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="parent_category2">
                                            <div class="div21">
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
                                                            @if ($incomes ->isEmpty())
                                                                
                                                            <div class="column " style="column-span: 100%;">No Incomes</div>
                                                            @else
                                                            @foreach ($incomes as $income  )
                                                            
                                                                
                                                            <div class="table-item">
                                                                
                                                                <div class="column"><h6 class="price gem">{{ $income->income_source?->name??"EDIT BY USER" }}</h6></div>
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
                                            <div class="div22">
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
                                                    @if ($expenses ->isEmpty())
                                                        
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
                                        </div>
                                        <div class="parent_category2">
                                            <div class="div21">
                                                <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                                    <div class="product-item offers">
                                                        <h6><i class="icon-description"></i><a href="{{ route('client.account.index') }}">Accounts</a></h6>
                                                        <i class="icon-keyboard_arrow_down"></i>
                                                        <div class="content">
                                                            <div class="table-heading">
                                                                <div class="column">Name</div>
                                                                <div class="column">Amount</div>
                                                                
                                                            </div>
                                                            @if ($accounts ->isEmpty())
                                                                
                                                            <div class="column " style="column-span: 100%;">No Account</div>
                                                            @endif
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
                                            <div class="div22"> 
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
                                                            @if ($transactions ->isEmpty())
                                                        
                                                                <div class="column " style="column-span: 100%;">No Transaction</div>
                                                            @endif
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
                                        </div>
                                        <div class="parent_category2">
                                            <div class="div21"> 
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
                                                    @if ($sources ->isEmpty())
                                                        
                                                    <div class="column " style="column-span: 100%;">No Sources</div>
                                                    @endif
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
                                            <div class="div22"> 
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
                                                    @if ($expences_category ->isEmpty())
                                                        
                                                    <div class="column " style="column-span: 100%;">No Categories</div>
                                                    @endif
                                                    @foreach ($expences_category as $expences_cat  )
                                                        
                                                    <div class="table-item">
                                                        <div class="column"><h6 class="price gem">{{ $expences_cat->name }}</h6></div>
                                                        <div class="column">{{ $expences_cat->description }}</div>
                                                       
                                                        
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>
    
                                            </div>
                                        </div>
                                        <div class="parent_category2">
                                            <div class="div21"> 
                                                <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                            <div class="product-item offers">
                                                <h6><i class="icon-description"></i><a href="{{ route('client.month_income.index') }}">Monthlys Income</a></h6>
                                                <i class="icon-keyboard_arrow_down"></i>
                                                <div class="content">
                                                    <div class="table-heading">
                                                        <div class="column">source</div>
                                                        <div class="column">amount</div>
                                                        <div class="column">weeks</div>
                                                        
                                                    </div>
                                                    @if ($monthly_incomes ->isEmpty())
                                                        
                                                    <div class="column " style="column-span: 100%;">No Sources</div>
                                                    @endif
                                                    @foreach ($monthly_incomes as $monthly_income  )
                                                        
                                                    <div class="table-item">
                                                        <div class="column"><h6 class="price gem">{{ $monthly_income->income_source ->name }}</h6></div>
                                                        <div class="column">{{ $monthly_income->amount }}</div>
                                                        <div class="column">{{ $monthly_income->period }}</div>
                                                        
                                                        
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>
    
                                            </div>
                                            <div class="div22"> 
                                                <div data-wow-delay="0s" class="wow fadeInUp col-12">
                                            <div class="product-item offers">
                                                <h6><i class="icon-description"></i><a href="{{ route('client.month_expense.index') }}">Monthlys Expense</a></h6>
                                                <i class="icon-keyboard_arrow_down"></i>
                                                <div class="content">
                                                    <div class="table-heading">
                                                        <div class="column">source</div>
                                                        <div class="column">amount</div>
                                                        <div class="column">weeks</div>
                                                        
                                                    </div>
                                                    @if ($monthly_expenses ->isEmpty())
                                                        
                                                    <div class="column " style="column-span: 100%;">No Sources</div>
                                                    @endif
                                                    @foreach ($monthly_expenses as $monthly_expense  )
                                                        
                                                    <div class="table-item">
                                                        <div class="column"><h6 class="price gem">{{ $monthly_expense->expense_category ->name }}</h6></div>
                                                        <div class="column">{{ $monthly_expense->amount }}</div>
                                                        <div class="column">{{ $monthly_expense->period }}</div>
                                                        
                                                        
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                        </div>
    
                                            </div>
                                        </div>
                                            
                                        {{-- </div> --}}
                                        
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