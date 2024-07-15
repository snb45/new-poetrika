<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poetrika</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{url('public/front/images/favicon.png')}}">

    <link href="{{url('public/front/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{url('public/front/css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{url('public/front/css/plugin.css')}}" rel="stylesheet" type="text/css">

    <link href="{{url('public/front/fonts/flaticon.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{url('public/front/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('public/front/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('public/front/fonts/line-icons.css')}}" type="text/css">
</head>
<body>

{{--<div id="preloader">--}}
{{--    <div id="status"></div>--}}
{{--</div>--}}


<header class="main_header_area">
    <div class="header-content py-1 bg-lgrey">
        <div class="container d-flex align-items-center justify-content-between">
            <h4 class="theme mb-0 w-25 fw-normal text-center me-2"><i class="fas fa-bolt"></i> Today Saying</h4>
            <div class="links float-right">
                <marquee scrolldelay="50" behavior="scroll" onmouseover="this.stop();" onmouseleave="this.start();">
                    <li><a href="#"><i class="fa fa-star"></i> “Speaks perfect English”: Trump’s offensive praise of a Latino Border Patrol agent</a></li>
                    <li><a href="#"><i class="fa fa-star"></i> Watch J. Lo live her best life, Nicki Minaj go regal, and Ariana Grande go religious.</a></li>
                    <li><a href="#"><i class="fa fa-star"></i> Tesla fans have found a new person to blame for Elon Musk’s troubles: his girlfriend</a></li>
                    <li><a href="#"><i class="fa fa-star"></i> The Pentagon won’t check if US bombs killed kids in Yemen. CNN did it for them.</a></li>
                </marquee>
            </div>
        </div>
    </div>

    <div class="header_menu" id="header_menu">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-2 pt-2">

                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="{{asset('front/images/logo.jpg')}}" alt="image">
                            <img src="{{asset('front/images/logo-white.png')}}" alt="image">
                        </a>
                    </div>

                    <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="responsive-menu">
                            <li><a href="{{route('home')}}">HOME</a></li>
                            <li><a href="{{route('aboutPage')}}">ABOUT</a></li>
                            <li><a href="{{route('mariagorethPoetry')}}">MARIAGORETH'S</a></li>
                            <li><a href="{{route('featuredPoets')}}">FEATURED POETS ACCOUNTs</a></li>
                            <li><a href="#">CONTACT US</a></li>
                        </ul>
                    </div>
                    <div class="register-login d-flex align-items-center">
                        <div class="header_sidemenu me-2">
                            <div class="mhead">
								<span class="menu-ham">
								    <a href="#" class="cart-icon d-flex align-items-center ml-1">
                                        <i class="fa fa-th-large theme"></i>
                                    </a>
								</span>
                            </div>
                        </div>
                        <div class="search-main">
                            <a href="#search1" class="mt_search">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                    <div id="slicknav-mobile"></div>
                </div>
            </div>
        </nav>
    </div>

</header>

@yield('content')

<footer class="footermain">
    <div class="footer-copyright pt-2 pb-2">
        <div class="container">
            <div class="copyright-inner d-md-flex align-items-center justify-content-between">
                <div class="copyright-text">
                    <p class="m-0 white">{{date('Y')}} Poetrika. All rights reserved.</p>
                </div>
                <div class="social-links">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<div id="back-to-top">
    <a href="#"></a>
</div>

{{--<div class="view-port">--}}
{{--    <div class="dark-mode"><a href="#"><i class="fa fa-moon"></i> Night</a></div>--}}
{{--    <div class="light-mode"><a href="#"><i class="fa fa-sun"></i> Day</a></div>--}}
{{--</div>--}}

<div id="search1">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<div class="header_sidemenu">
    <div class="header_sidemenu_in">
        <div class="menu bg-navy py-5 px-4">
            <div class="close-menu">
                <i class="fa fa-times white"></i>
            </div>
            <div class="m-contentmain">
                <div class="m-contentmain">
                    <div class="m-logo mb-5">
                        <img src="{{asset('public/front/images/logo-white.png')}}" alt="m-logo">
                    </div>
                    <div class="content-box mb-5">
                        <?php $aboutPage = \App\Models\About::first(); ?>
                        <p class="white mb-2">{!! $aboutPage->about !!}</p>
                    </div>
{{--                    <div class="contact-info">--}}
{{--                        <h3 class="white">Contact Info</h3>--}}
{{--                        <ul>--}}
{{--                            <li class="white d-block mb-1"><i class="fa fa-map-marker-alt me-1"></i> Brozon Mall 26, Newyrok NY 10005</li>--}}
{{--                            <li class="white d-block mb-1"><i class="fa fa-phone-alt me-1"></i>555 626-0234</li>--}}
{{--                            <li class="white d-block mb-1"><i class="fa fa-envelope-open me-1"></i><a href="https://htmldesigntemplates.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b2c1c7c2c2ddc0c6f2dfd3d5d0d7c0d59cd1dddf">[email&#160;protected]</a></li>--}}
{{--                            <li class="white d-block"><i class="fa fa-clock me-1"></i> Week Days: 09.00 to 18.00 Sunday: Closed</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <div class="overlay hide"></div>
    </div>
</div>

<script src="{{url('public/front/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{url('public/front/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/front/js/plugin.js')}}"></script>
<script src="{{url('public/front/js/main.js')}}"></script>
<script src="{{url('public/front/js/custom-swiper1.js')}}"></script>
<script src="{{url('public/front/js/custom-nav.js')}}"></script>

</body>
</html>
