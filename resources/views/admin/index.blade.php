@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

{{--    @component('common-components.breadcrumb')--}}
{{--        @slot('title') Dashboard Page  @endslot--}}
{{--        @slot('li_1') Pages  @endslot--}}
{{--    @endcomponent--}}

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Summary</h4>
                <div class="d-flex">
                    <h2 class="mr-2">
                        <i class="mdi mdi-monitor-dashboard text-primary mr-2"></i> Poetrika Dashboard
                    </h2>
                    <hr>
                </div>
                <div class="text-center">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="pt-4">
                                <div class="avatar-sm mx-auto font-size-26">
                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                        <i class="mdi mdi-note"></i>
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <h5 class="mb-1">{{ucwords('Number of poems')}}</h5>
                                    <p class="text-truncate">{{$w}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="pt-4">
                                <div class="avatar-sm mx-auto font-size-26">
                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                        <i class="mdi mdi-video"></i>
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <h5 class="mb-1">Number of Videos</h5>
                                    <p class="text-truncate">{{$v}}</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="pt-4">
                                <div class="avatar-sm mx-auto font-size-26">
                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                        <i class="mdi mdi-audio-video"></i>
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <h5 class="mb-1">Number of Audio Clips</h5>
                                    <p class="text-truncate">{{$a}}</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
