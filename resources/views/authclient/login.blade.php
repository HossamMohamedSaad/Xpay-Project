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
                                    <h2 class="tf-title pb-16">Login</h2>
                                    <p class="pb-40">Get started today by entering just a few details</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="widget-login">
                                    <form method="POST" action="{{ route('client.login') }}" id="commentform"
                                        class="comment-form">
                                        @csrf
                                        <fieldset class="email">
                                            <label>Email *</label>
                                            <input type="email" id="email" placeholder="mail@website.com" name="email"
                                                tabindex="2"  aria-required="true" required value="{{ old('email') }}">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                        </fieldset>
                                        <fieldset class="password">
                                            <label>Password *</label>
                                            <input class="password-input" type="password" id="password"
                                                placeholder="Min. 8 character" name="password" tabindex="2" value="{{ old('password') }}"
                                                aria-required="true" required>
                                            {{-- <i class="icon-show password-addon" id="password-addon"></i> --}}
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                            {{-- <div class="forget-password">
                                                <a href="#">Forget password</a>
                                            </div> --}}
                                        </fieldset>
                                        <div class="btn-submit mb-30">
                                            <button type="submit" class="tf-button style-1 h50 w-100"
                                                type="submit">Login<i class="icon-arrow-up-right2"></i></a>
                                        </div>
                                    </form>

                                    <div class="no-account">Don't have an account? <a
                                            href="{{ route('client.register') }}" class="tf-color">Sign up</a></div>
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