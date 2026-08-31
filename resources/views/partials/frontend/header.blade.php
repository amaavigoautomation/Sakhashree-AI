<header class="topband">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 col-6">
                <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('dist/img/logo.png') }}"
                            alt="Gopinathan Chakra Healer" /></a>
                </div>
            </div>
            <div class="col-md-9 col-6">
                <div class="topmenuarea">
                    <div>
                        <!-- menu start here -->
                        <div class="header">
                            <div class="menuarea">
                                <div class="menu-overlay"></div>
                                <nav class="menu">
                                    <div class="mobile-menu-head">
                                        <div class="go-back"><i class="fa fa-angle-left"></i></div>
                                        <div class="current-menu-title"></div>
                                        <div class="mobile-menu-close">&times;</div>
                                    </div>
                                    <ul class="menu-main">
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('about') }}">About Me</a></li>
                                        <li><a href="{{ route('products') }}">Shop Products</a></li>
                                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                        <li><a href="{{ route('blogs') }}">Blog</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="mobile-menu-trigger"><span></span></div>
                        </div>
                        <!-- menu end here -->
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div><a href="tel:+16473000249"><button class="callbtn"><i
                                        class="fa-solid fa-phone hidedesktab"></i><span class="hidemob">Call:
                                        +16473000249</span></button></a></div>
                        <div class="topsocialicon">
                            <ul>
                                <li><a href="https://www.facebook.com/profile.php?id=100011059427285"
                                        target="_blank"><img src="{{ asset('dist/img/facebook.svg') }}"></a></li>
                                <li><a href="https://www.instagram.com/chakrayog.ca/" target="_blank"><img
                                            src="{{ asset('dist/img/instagram.svg') }}"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
