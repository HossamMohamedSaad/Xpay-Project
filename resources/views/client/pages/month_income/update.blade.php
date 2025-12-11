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

                    <div id="month_income" class="tabcontent {{ Route::currentRouteName() == 'client.month_income.edit' ? 'active' : '' }}">
                        <div class="wrapper-content">
                            <div class="inner-content">
                                
                                <div class="widget-edit mb-30 profile">
                                    <div class="title">
                                        <h4>Update Monthly Income</h4>
                                        <i class="icon-keyboard_arrow_up"></i>
                                    </div>
                                    <form   id="commentform" class="comment-form" novalidate="novalidate"
                                            method="post" action="{{ route('client.month_income.update') }}">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden"   name="id" value="{{ $month_income->id }}" >
                                        <div class="flex gap30">
                                            <fieldset class="curency">
                                                <label>Income Source</label>
                                                <select class="select" name="income_source_id" id="curency">
                                                    <option value="{{ $month_income->income_source_id }}" selected>{{ $month_income->income_source->name }}</option>
                                                    @foreach ($income_sources as $income_source )
                                                    <option value="{{ $income_source->id }}">{{ $income_source->name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </fieldset>
                                            <fieldset class="amount">
                                                <label>amount </label>
                                                <input type="text" id="amount" value="{{ $month_income->amount }}" name="amount" tabindex="2" value="" aria-required="true" required>
                                            </fieldset>
                                            <fieldset class="period">
                                                <label>period </label>
                                                <input type="text" id="period" value="{{ $month_income->period }}" name="period" tabindex="2" value="" aria-required="true" required>
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