
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from fastwp.net/welcome/html/heeney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 May 2020 07:02:58 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Poetrika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/line-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/js/lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/js/lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/color.css')}}">

</head>


<body>

{{--<div class="preloader">--}}
    {{--<div class="blobs">--}}
        {{--<div class="blob-center"></div>--}}
        {{--<div class="blob"></div>--}}
        {{--<div class="blob"></div>--}}
        {{--<div class="blob"></div>--}}
        {{--<div class="blob"></div>--}}
        {{--<div class="blob"></div>--}}
        {{--<div class="blob"></div>--}}
    {{--</div>--}}
    {{--<svg xmlns="http://www.w3.org/2000/svg" version="1.1">--}}
        {{--<defs>--}}
            {{--<filter id="goo">--}}
                {{--<feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />--}}
                {{--<feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />--}}
                {{--<feBlend in="SourceGraphic" in2="goo" />--}}
            {{--</filter>--}}
        {{--</defs>--}}
    {{--</svg>--}}
{{--</div><!--PRELOADER END-->--}}

<div class="wrapper">

    <header>
        <div class="container">
            <div class="top-bar">
                <div class="menu-btn">
                    <a href="#" title="">
                        <span class="bar1"></span>
                        <span class="bar2"></span>
                        <span class="bar3"></span>
                    </a>
                </div><!--menu-btn end-->
                <nav>
                    @include('includes.navigations.homeNav')
                </nav>
            </div>
            <div class="bottom-header">
                <div class="container">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img id="logo" src="{{asset('home/images/logo.jpg')}}" alt="logo" height="200px">
                        </a>
                    </div><!-- logo end-->
                </div>
            </div><!--bottom-header end-->
            <nav style="width: 100%; margin: auto; border: black 1px solid;">
                @include('includes.navigations.navMiddle')
            </nav><!--navigation end-->
            <hr style="border: black 2px solid">
        </div>
    </header><!--HEADER END-->

    <div class="side-menu">
        <a href="#" title="" class="close-sidemenu"><i class="la la-close"></i></a>
        @include('includes.navigations.homeNav2')
    </div><!--side-menu end-->

    @yield('content')


    <footer>
        <div class="container">

            <div class="footer-content">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="ft-logo">
                            <h1><a href="#" title=""><img id="logo" src="{{asset('home/images/logo.jpg')}}" alt="logo" height="50px"></a></h1>
                        </div><!--ft-logo end-->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <ul class="social-links">
                            <li><a href="#" title=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" title=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" title=""><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <ul class="ft-links">
                            <li><a href="mailto:abdallahswalehe@hotmail.com">Created By Suna</a></li>
                        </ul><!--ft-links end-->
                    </div>
                </div>
            </div><!--footer-content end-->
        </div>
    </footer><!--footer end-->


    <section class="bottom-strip">
        <div class="container">
            <p>©{{date('Y')}} Poetrika. All Rights Reserved.</p>
        </div>
    </section><!--bottom-strip end-->

    <div class="search-page">
        <form>
            <div class="container">
                <div class="form-field">
                    <input type="text" name="search" placeholder="Enter Your Keywords">
                    <button type="submit"><i class="la la-search"></i></button>
                </div>
            </div>
        </form>
        <a href="#" title="" class="close-search"><i class="la la-close"></i></a>
    </div><!--SEARCH PAGE END-->



</div><!--wrapper end-->



{{--<script src="{{asset('home/js/jquery.min.js')}}"></script>--}}
<script src="{{asset('home/js/popper.js')}}"></script>
<script src="{{asset('home/js/bootstrap.min.js')}}"></script>
<script src="{{asset('home/js/lib/slick/slick.js')}}"></script>
<script src="{{asset('home/js/script.js')}}"></script>



</body>


<!-- Mirrored from fastwp.net/welcome/html/heeney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 May 2020 07:03:36 GMT -->
</html>
