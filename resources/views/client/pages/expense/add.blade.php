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
                    
                    <div id="expense" class="tabcontent {{ Route::currentRouteName() == 'client.expense.add' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                
                                <div class="widget-edit mb-30 profile">
                                    <div class="title">
                                        <h4>Add New Expense </h4>
                                        <i class="icon-keyboard_arrow_up"></i>
                                    </div>
                                    <form   id="commentform" class="comment-form" novalidate="novalidate"
                                            method="post" action="{{ route('client.expense.create') }}">
                                        @csrf
                                        @method('POST')
                                        <div class="flex gap30">
                                            <fieldset class="curency">
                                                <label>Expense Category</label>
                                                @if ($expense_categorys == null || $expense_categorys->isEmpty() )
                                                
                                                <p>No expense category</p>
                                                @else
                                                <select class="select" name="expense_category_id" id="curency">
                                                    @foreach ($expense_categorys as $expense_category )
                                                        <option value="{{ $expense_category->id }}">{{ $expense_category->name }} </option>
                                                    @endforeach
                                                </select>
                                                @endif
                                                    
                                            </fieldset>
                                            <fieldset class="curency">
                                                <label>Account</label>
                                                @if ($accounts == null)
                                                
                                                <p>No Account</p>
                                                @else
                                                <select class="select" name="account_id" id="curency">
                                                        @if ($accounts->where('is_default', true))
                                                            @php
                                                            
                                                            $acc_default = $accounts->where('is_default', true)->first();
                                                            @endphp
                                                            <option value="{{ $acc_default->id }}">{{ $acc_default->name }} -- Default</option>
                                                        @endif
                                                        @foreach ($accounts as $account )
                                                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                                    
                                            </fieldset>
                                            <fieldset class="amount">
                                                <label>amount </label>
                                                <input type="text" id="amount" placeholder="Your Amount  " name="amount" tabindex="2" value="" aria-required="true" required>
                                            </fieldset>
                                            <fieldset class="description">
                                                <label>Description </label>
                                                <input type="text" id="description" placeholder="Your description   " name="description" tabindex="2" value="" aria-required="true" required>
                                            </fieldset>
                                            
                                        </div>
                                        
                                        <div class="btn-submit">
                                            <button class="w242" type="submit">Save</button>
                                        </div>
                                    </form>
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