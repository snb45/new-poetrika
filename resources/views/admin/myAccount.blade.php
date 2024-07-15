@extends('layouts.master')

@section('title') {{ucwords(Auth::user()->name)}} Profile @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ucwords(Auth::user()->name)}} Profile Page @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="profile-widgets py-3">
                        <div class="text-center">
                            <div class="">
                                @if($account->getFirstMedia())
                                    <img style="object-fit: cover" src="{{$account->getFirstMedia()->getUrl('thumb')}}" alt="{!!  strtoupper($account->name) !!}" class="w-100">
                                @else
                                    <img style="object-fit: cover" src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($account->name) !!}" class="w-100">
                                @endif
                            </div>

                            <div class="mt-3 ">
                                <a href="#" class="text-dark font-weight-medium font-size-20">{{ucwords(Auth::user()->name)}}</a>
                                <p class="text-body mt-1 mb-1">{{strtolower(Auth::user()->email)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Personal Information</h5>

                    <p class="card-title-desc">
                        {{ucwords(Auth::user()->name)}}
                    </p>

                    <div class="mt-3">
                        <p class="font-size-12 text-muted mb-1">Email Address</p>
                        <h6 class="">{{strtolower(Auth::user()->email)}}</h6>
                    </div>

                    <div class="mt-3">
                        <p class="font-size-12 text-muted mb-1">Phone number</p>
                        <h6 class="">{{Auth::user()->phone}}</h6>
                    </div>

                    {{--<div class="mt-3">--}}
                        {{--<p class="font-size-12 text-muted mb-1">Office Address</p>--}}
                        {{--<h6 class="">{{ucwords(Auth::user()->address)}}</h6>--}}
                    {{--</div>--}}

                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-9">
            <div class="row">
                <div class="col-md-12 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                        <p class="mb-2">Word Poems</p>
                                    <h4 class="mb-0">{{$w}}</h4>
                                </div>
                                <div class="col-4">
                                    <div class="text-right">
                                        <div class="progress progress-sm mt-3">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"
                                                 aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <p class="mb-2">Video Poems</p>
                                    <h4 class="mb-0">{{$v}}</h4>
                                </div>
                                <div class="col-4">
                                    <div class="text-right">
                                        <div class="progress progress-sm mt-3">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"
                                                 aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <p class="mb-2">Audio Poems</p>
                                    <h4 class="mb-0">{{$a}}</h4>
                                </div>
                                <div class="col-4">
                                    <div class="text-right">
                                        <div class="progress progress-sm mt-3">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"
                                                 aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Settings</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <form action="{{route('updateUser',$account->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="settings" role="tabpanel">

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Photo</label>
                                            <input type="file" class="form-control" id="photo" name="photo" placeholder="Enter last name">
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Phone Number</label>
                                            <input type="number" class="form-control" value="{{$account->phone}}" id="phone" name="phone" placeholder="Enter Your Phone number">
                                        </div>
                                    </div> <!-- end col -->
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="Enter your name" value="{{$account->name}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label for="useremail">Email Address</label>
                                            <input type="email" class="form-control" autocomplete="new-password" id="useremail" name="email"
                                                   placeholder="Enter email" value="{{$account->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label for="userpassword">New Password</label>
                                            <input type="password" autocomplete="new-password" class="form-control" name="password" id="userpassword"
                                                   placeholder="Enter password">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label for="userpassword">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirmPassword" id="userpassword"
                                                   placeholder="Confirm password">
                                        </div>
                                    </div> <!-- end col -->
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="userbio">Bio</label>
                                            <textarea class="form-control" id="mytextarea" name="bio" rows="4"
                                                      placeholder="Write something...">{{$account->bio}}</textarea>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pull-right">
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark waves-effect waves-light btn-block" value="Save" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

@endsection
