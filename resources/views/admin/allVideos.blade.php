@extends('layouts.master')

@section('title') Video Poets @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Video Poets  @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <div class="row">
        @foreach($videos as $video)
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h2 style="font-weight: bold; text-align: center">{{ucwords($video->title)}}</h2>
                    <p class="card-title-desc">{!! substr($video->descriptions,0,200) !!}</p><hr>
                    <p class="card-title-desc">DATE : {{ date('d M ,Y', strtotime($video->created_at))." "." (".Carbon\Carbon::parse($video->created_at)->diffForHumans().") "  }}</p><hr>
                    <p class="card-title-desc">CATEGORY : {{ucwords($video->categoryName)}}</p><hr>
                    <div class="embed-responsive embed-responsive-16by9">
                        <video preload="none" data-setup='{"fluid": true}' muted id="{{$video->id}}" controlsList="nodownload" class="video-js" controls width="100%" height="280px"
                                poster="{{asset('/videos/'.$video->displayImage)}}" data-setup="{}" crossorigin="use-credentials">
                            <source src="{{asset('/videos/'.$video->videoFile)}}" type='video/mp4'>
                            <p class="vjs-no-js">
                                Error! While Loading video! please refresh our page.
                            </p>
                        </video>
                    </div>
                </div>

                @if(Auth::user()->role == "admin")
                    <div class="card">
                        <div class="card-body">
                            @if($video->status == 0)
                                <a href="{{route('approveVideo',$video->id)}}" class="btn btn-success waves-effect waves-light btn-block">Approve</a>
                            @else
                                <a href="{{route('disApproveVideo',$video->id)}}" class="btn btn-danger waves-effect waves-light btn-block">Dis Approve</a>
                            @endif

                                @if(Auth::user()->role == "admin")
                                    @if($video->selected == 0)
                                        <a href="{{route('poetOfTheWeekVideo',$video->id)}}" class="btn btn-secondary btn-sm btn-block">Make poet of the week</a><br><hr>
                                    @else
                                        <p class="btn btn-success btn-sm btn-block">selected poet of the week</p><br><hr>
                                    @endif
                                @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
@endsection
