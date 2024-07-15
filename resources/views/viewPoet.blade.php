@extends('layouts.app')

@section('content')

<div class="page-cover pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="cover-content">
                    <div class="author-detail mb-2">
                        <a href="#" class="tag white bg-theme py-1 px-3 me-2">#{{$video->categoryName}}</a>
                        <a href="#" class="tag white bg-navy py-1 px-3"><i class="fa fa-eye"></i> 2500</a>
                    </div>
                    <h1>{!! ucwords($video->title) !!}</h1>
                    <p class="white first-child-cap">“{!! $video->poetry !!}” </p><hr>
                    <div class="author-detail d-flex align-items-center">
                        <span class="me-3"><a href="#"><i class="fa fa-clock"></i> Posted On : {{date('d M Y', strtotime($video->created_at))}}</a></span>
                        <span class="me-3"><a href="#"><i class="fa fa-user"></i> {{$video->userName}}</a></span>
                        <span><a href="#"><i class="fa fa-heart text-danger"></i> {{$likes}}</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box-shadow p-3 position-relative">
                    @if($video->displayImage != null)
                        <img src="{{asset('/videos/'.$video->displayImage)}}" alt="{!!  strtoupper($video->title) !!}" />
                    @else
                        <img src="{{asset('/videos/notFound.jpg')}}" alt="{!!  strtoupper($video->title) !!}" />
                    @endif
                    <div class="video-button text-center">
                        <div class="call-button text-center">
                            <button type="button" class="play-btn js-video-button" data-video-id="{{$video->videoFile}}" data-channel="youtube">
                                <i class="fa fa-play bg-blue"></i>
                            </button>
                        </div>
{{--                        <div class="video-figure">--}}
{{--                            <iframe width="420" height="315" src="https://www.youtube.com/embed/{{$video->videoFile}}?controls=0 rel=0">--}}
{{--                            </iframe>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog blog-left pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="blog-single">

                    <div class="blog-author mb-4 bg-grey border">
                        <div class="blog-author-item">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="blog-thumb text-center position-relative">
                                        <img src="@if($video->userPhoto == null)
                                        {{url('public/noImage.jpeg')}} @else
                                        {{asset('/profiles/'.$video->userPhoto)}}
                                        @endif" alt="{{ucwords($video->userName)}}">
                                    </div>
                                </div>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <h3 class="title pink"><a href="{{route('viewByPoet',$video->userId)}}">About {{ucwords($video->userName)}}</a></h3>
                                    <p class="m-0">@if($video->bio == null) No Bio Yet! @else  {!! $video->bio !!} @endif</p>
                                    <hr>
                                    <div class="header-social">
                                        <ul>
                                            <li><a href="tel:{{$video->phone}}"><i class="fa fa-phone"></i></a></li>
                                            <li><a href="mailto:{{$video->email}}"><i class="fa fa-send"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="blog-next mb-4 d-flex align-items-center">
                        <a href="#" class="float-left">
                            <div class="prev ps-4">
                                <i class="fa fa-arrow-left white"></i>
                                <p class="m-0 white">Previous </p>
                                <p class="m-0 white">The bedding was hardly able</p>
                            </div>
                        </a>
                        <a href="#" class="float-right bg-grey">
                            <div class="next pr-4 text-right">
                                <i class="fa fa-arrow-right"></i>
                                <p class="m-0">Next </p>
                                <p class="m-0">The bedding was hardly able</p>
                            </div>
                        </a>
                    </div>

                    <div class="single-add-review">
                        @comments(['model' => $video])
                    </div>

                </div>
            </div>
            @include('includes.othersCategory')
        </div>
    </div>
</section>

@endsection
