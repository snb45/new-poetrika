    <li>
        <a href="{{route('home')}}"><i class="fa fa-home"></i></a>
    </li>
    <li>
        <a href="#">@if(Auth::check()) {{ucwords('Welcome back '.Auth::user()->name)}} @else {{ucwords('Welcome to poetrika official website')}} @endif</a>
    </li>
    <li><a href="#">|</a></li>
    <li>
        @if(Auth::check())
            @if(Auth::user()->role == "admin")
                <a target="_blank" href="{{route('admin')}}">{{ucwords('My Dashboard')}}</a>
            @else
                <a target="_blank" href="{{route('admin')}}">{{ucwords('My Dashboard')}}</a>
            @endif
        @else
            <a href="{{route('login')}}">{{ucwords('Login to you account')}} </a>
        @endif
    </li>


{{--<li><a href="">WELCOME TO POETRIKA OFFICIAL WEBSITE</a></li>--}}
{{--<li><a href="">|</a></li>--}}
{{--<li><a href="">LOGIN TO YOU ACCOUNT</a></li>--}}