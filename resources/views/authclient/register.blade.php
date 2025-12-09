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
            {{-- @include('client.main.head') --}}

            <div class="flat-tabs">
                <div class="tf-section-2 pt-60 widget-box-icon">
                <div class="themesflat-container w920" style="right: 150px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section-1">
                                <h2 class="tf-title pb-16">Create you account</h2>
                                <p class="pb-40">Let’s get started with your 14 days free trial</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="widget-login">
                                <form  method="POST" action="{{ route('client.register') }}" id="commentform" class="comment-form">
                                    @csrf
                                    <fieldset class="name">
                                        <label>Name *</label>
                                        <input type="text" id="name" placeholder="Your name*" name="name" tabindex="2" value="" aria-required="true" required>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                    </fieldset>
                                    <fieldset class="email">
                                        <label>Email *</label>
                                        <input type="email" id="email" placeholder="mail@website.com" name="email" tabindex="2" value="" aria-required="true" required>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    </fieldset>
                                    <fieldset class="phone">
                                        <label>Phone *</label>
                                        <input type="text" id="phone" placeholder="01234567891" name="phone" tabindex="2" value="" aria-required="true" required>
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                                    </fieldset>
                                    <fieldset class="password">
                                        <label>Password *</label>
                                        <input class="password-input" type="password" id="password" placeholder="Min. 8 character" name="password" tabindex="2" value="" aria-required="true" required>
                                        {{-- <i class="icon-show password-addon" id="password-addon"></i> --}}
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    </fieldset>
                                    <fieldset class="password">
                                        <label>Confirm password *</label>
                                        <input class="password-input" type="password" id="password" placeholder="Confirm password " name="password_confirmation" tabindex="2" value="" aria-required="true" required>
                                        {{-- <i class="icon-show password-addon" id="password-addon"></i> --}}
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                        
                                    </fieldset>
                                    <div class="btn-submit mb-30">
                                        <button type="submit"  class="tf-button style-1 h50 w-100" >Sign up<i class="icon-arrow-up-right2"></i></button>
                                    </div>
                                </form>
                                
                                <div class="no-account">Already have an account?  <a href="{{ route('client.login') }}" class="tf-color">Log in</a></div>
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