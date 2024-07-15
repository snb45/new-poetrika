<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-right">

                <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group" style="text-align: center">
                                    <input readonly type="text" class="form-control" placeholder="Today is: {{date('d M, Y')}}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::id())
                            <?php $account = \App\Models\User::find(Auth::id()); ?>
                            @if($account->getFirstMedia())
                                <img src="{{$account->getFirstMedia()->getUrl('thumb')}}" alt="{!!  strtoupper($account->name) !!}" class="rounded-circle header-profile-user">
                            @else
                                <img src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($account->name) !!}" class="rounded-circle header-profile-user">
                            @endif
                        @endif
                        <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item text-danger"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                            <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                            <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="../../images/logo-sm.png" alt="" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="../../images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>

                    <a href="" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="../../images/logo-sm.png" alt="" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="../../images/logo-light.png" alt="" height="19">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-inline-block">
                    <div class="position-relative">
                        <input readonly type="text" class="form-control" placeholder="Today is: {{date('d M, Y')}}">
                        <span class="bx bx-time"></span>
                    </div>
                </form>
            </div>

        </div>
    </div>
</header>
