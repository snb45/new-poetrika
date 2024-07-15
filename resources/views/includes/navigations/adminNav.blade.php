<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                @if(Auth::id())
                    <?php $account = \App\Models\User::find(Auth::id()); ?>
                    @if($account->getFirstMedia())
                        <img src="{{$account->getFirstMedia()->getUrl('thumb')}}" alt="{!!  strtoupper($account->title) !!}" class="avatar-md mx-auto rounded-circle">
                    @else
                        <img src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($account->title) !!}" class="avatar-md mx-auto rounded-circle">
                    @endif
                @endif
            </div>

            <div class="mt-3">
                <a href="{{route('myAccount')}}" class="text-dark font-weight-medium font-size-16">{{Auth::user()->name}}</a>
                <p class="text-body mt-1 mb-0 font-size-13">{{Auth::user()->email}}</p>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('admin')}}" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if(Auth::user()->role == "admin")
                    <li>
                        <a href="{{route('about')}}" class=" waves-effect">
                            <i class="mdi mdi-information"></i>
                            <span>About Poetrika</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->role == "admin")
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-account-circle-outline"></i>
                            <span>Accounts</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('myAccount')}}">My Accounts</a></li>
                            <li><a href="{{route('accounts')}}">All Accounts</a></li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{route('myAccount')}}" class=" waves-effect">
                            <i class="mdi mdi-calendar-text"></i>
                            <span>My Account</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->role == "admin")
                    <li class="menu-title">Categories</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-flip-horizontal"></i>
                            <span>Manage Categories</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('categories')}}">Categories</a></li>
                        </ul>
                    </li>
                @endif

                <li class="menu-title">Poetry</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-flip-horizontal"></i>
                        <span>My Poems</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('words')}}">Poems</a></li>
                        <li><a href="{{route('video')}}">Videos</a></li>
                        <li><a href="{{route('audio')}}">Audio clips</a></li>
                        <li><a href="{{route('manageCards')}}">Cards</a></li>
                    </ul>
                </li>

                <li class="menu-title">Books</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-flip-horizontal"></i>
                        <span>My Books</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(Auth::user()->role == "admin")
                            <li><a href="{{route('manageBooks')}}">Books</a></li>
                        @else
                            <li><a href="{{route('myBooks')}}">Books</a></li>
                        @endif
                    </ul>
                </li>

                <li class="menu-title">Poetry poets, poems & prose</li>

                @if(Auth::user()->role == "admin")
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-newspaper"></i>
                            {{--<span class="badge badge-pill badge-danger float-right">6</span>--}}
                            <span>Featured poets </span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('allWords')}}">Poems</a></li>
                            <li><a href="{{route('allVideos')}}">Videos</a></li>
                            <li><a href="{{route('allAudio')}}">Audio clips</a></li>
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->role == "admin")
                    <li class="menu-title">Themes</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-flip-horizontal"></i>
                            <span>Themes</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('categories')}}">Manage Themes</a></li>
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->role == "admin")
                    <li class="menu-title">Social Media</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa fa-facebook"></i>
                            <span>Social Media</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('social')}}">Manage Social</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
