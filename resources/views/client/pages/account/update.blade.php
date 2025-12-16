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

                    <div id="account" class="tabcontent {{ Route::currentRouteName() == 'client.account.edit' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                
                                <div class="widget-edit mb-30 profile">
                                    <div class="title">
                                        <h4>Update Account</h4>
                                        <i class="icon-keyboard_arrow_up"></i>
                                    </div>
                                    <form   id="commentform" class="comment-form" novalidate="novalidate"
                                            method="post" action="{{ route('client.account.update') }}">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden"   name="id" value="{{ $account->id }}" >
                                        <div class="flex gap30">
                                            <fieldset class="name">
                                                <label>Account name</label>
                                                <input type="text" id="name"  name="name" tabindex="2" value="{{ $account->name }}" aria-required="true" required>
                                            </fieldset>
                                            <fieldset class="amount">
                                                <label>Account balance</label>
                                                <input type="text" id="amount"  name="amount" tabindex="2" value="{{ $account->amount }}" aria-required="true" required>
                                            </fieldset>
                                            
                                                <input type="hidden" id="oldamount"  name="oldamount" tabindex="2" value="{{ $account->amount }}" aria-required="true" required>
                                            
                                        </div>
                                        <fieldset class="default">

                                                <div class="notification-setting-item">
                                                    <div class="content">
                                                        <h6>Account default</h6>
                                                        <p>This will be the default account to be used in Expenses</p>
                                                    </div>
                                                    <input class="check" type="checkbox" value="checkbox" name="default" >
                                                </div>
                                        </fieldset>
                                        
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