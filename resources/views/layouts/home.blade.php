<!DOCTYPE HTML>
<!-- BEGIN html -->
<html lang = "en">
<!-- BEGIN head -->

<!-- Mirrored from composs.orange-themes.net/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Sep 2020 08:08:18 GMT -->
<head>
    <title>Poetrika</title>

    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />

    <!-- Stylesheets -->
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700+Open+Sans:400,700" />
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/reset.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/owl.carousel.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/animate.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/main-stylesheet.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/ot-lightbox.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/shortcodes.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/responsive.min.css')}}" />

    <style>
        body {
            font-size: 16px;
            font-family: Arial, sans-serif;
            color: #5e5e5e;
        }
    </style>

    <!-- Demo Only -->
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/_ot-demo.min.css')}}" />

</head>

<body class="ot-menu-will-follow">
<div class="boxed">

    <div class="header">
        <div class="wrapper">

            <nav class="header-top">
                <div class="header-top-socials">
                    <a href="#" class="ot-color-hover-facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="ot-color-hover-youtube"><i class="fa fa-youtube"></i></a>
                    <a href="#" class="ot-color-hover-instagram"><i class="fa fa-instagram"></i></a>
                </div>

                <ul>
                   @include('includes.navigations.homeNav')
                </ul>
            </nav>

            <div class="header-content" style="text-align: center;">

                <div class="header-content-logo">
                    <a href="{{route('home')}}"><img src="{{asset('home/images/logo.jpg')}}" data-ot-retina="images/logo.jpg" alt="" /></a>
                </div>
            </div>

            <div class="main-menu-placeholder wrapper">
                <nav id="main-menu">
                    <ul>
                        @include('includes.navigations.homeNav2')
                    </ul>
                    <form action="" method="get">
                        <input type="text" value="" placeholder="Search" />
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </nav>
            </div>

        </div>
    </div>

    @yield('content')

    <footer id="footer">
        <div class="wrapper">

            <div class="footer-copyright">
                <p>&copy; <a href="http://orange-themes.com/" target="_blank">Poetrika</a> {{date('Y')}}. All rights reserved.</p>
            </div>

        </div>
    </footer>

    <div class="ot-responsive-menu-header">
        <a href="#" class="ot-responsive-menu-header-burger"><i class="material-icons">menu</i></a>
        <a href="{{route('home')}}" class="ot-responsive-menu-header-logo"><img src="{{asset('home/images/logo.png')}}" alt="" /></a>
    </div>

    <!-- END .boxed -->
</div>

<div class="ot-responsive-menu-content-c-header">
    <a href="#" class="ot-responsive-menu-header-burger"><i class="material-icons">menu</i></a>
</div>
<div class="ot-responsive-menu-content">
    <div class="ot-responsive-menu-content-inner has-search">
        <form action="http://composs.orange-themes.net/html/blog.html" method="get">
            <input type="text" value="" placeholder="Search" />
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <ul id="responsive-menu-holder"></ul>
    </div>
</div>
<div class="ot-responsive-menu-background"></div>

<!-- Scripts -->
<script type="text/javascript" src="{{asset('home/jscript/jquery-latest.min.js')}}"></script>
<script type="text/javascript" src="{{asset('home/jscript/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('home/jscript/theia-sticky-sidebar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('home/jscript/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('home/jscript/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('home/jscript/shortcode-scripts.min.js')}}"></script>
<script type="text/javascript" src="{{asset('home/jscript/theme-scripts.min.js')}}"></script>
<script type="text/javascript" src="{{asset('home/jscript/ot-lightbox.min.js')}}"></script>
<script>
    jQuery('.main-slider-owl').owlCarousel({
        margin: 20,
        responsiveClass: true,
        items: 1,
        nav: false,
        dots: true,
        loop: false,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });
</script>

</body>
</html>
