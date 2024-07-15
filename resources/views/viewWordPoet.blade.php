@extends('layouts.app')

@section('content')
    @if($word->getFirstMedia())
        <section class="breadcrumb-main pb-0 pt-6" style="background-image: url('{{$word->getFirstMediaUrl()}}');">
            @else
                <section class="breadcrumb-main pb-0 pt-6"
                         style="background-image: url('{{url('public/noImage.jpeg')}}');">
                    @endif
                    <div class="breadcrumb-outer">
                        <div class="container">
                            <div class="breadcrumb-content d-md-flex align-items-center pt-6">
                                <h2 class="mb-0">{!! ucwords($word->title) !!}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="dot-overlay"></div>
                </section>

                <section class="discount-action bg-white pbottom pt-0">
                    <div class="container">
                        <div class="section-title mb-4 pb-1 w-50"><br>

                        </div>
                        @if($word->getFirstMedia())
                            <div class="call-banner" style="background-image: url('{{$word->getFirstMediaUrl()}}');">
                        @else
                            <div class="call-banner" style="background-image: url('{{url('public/noImage.jpeg')}}');">
                        @endif
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-6 col-md-7 p-0">
                                    <div class="call-banner-inner bg-theme">
                                        <div class="trend-content-main">
                                            <div class="trend-content p-4">
                                                <p class="white">{!! $word->poetry !!}</p><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-5 p-0"></div>
                            </div>
                        </div>
                    </div>
                </section>
        {{-- @comments(['model' => $words])--}}
        @include('includes.moreByCategory')
@endsection
