@extends('layouts.app')

@section('content')

    <section class="featured-video pb-5 bg-grey">
        <div class="container">
            <div class="section-title mb-4 pb-1 w-50">
                <h2 class="m-0">Poetry poets, poems <span>& prose page </span></h2>
            </div>
            <div class="featured-video-main">
                <div class="row d-flex align-items-center">
                    @foreach($featuredPoets as $poet)
                        <div class="col-lg-3 mb-4">
                            <div class="featured-item">
                                <div class="featured-image">
                                    @if($poet->getFirstMedia())
                                        <img style="height: 300px;width: 100%;object-fit: cover" src="{{$poet->getFirstMedia()->getUrl('thumb')}}" alt="{!!  strtoupper($poet->name) !!}" class="w-100">
                                    @else
                                        <img style="height: 300px;width: 100%;object-fit: cover" src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($poet->name) !!}" class="w-100">
                                    @endif
                                    <div class="color-overlay"></div>
                                </div>
                                <div class="featured-content-main">
                                    <div class="featured-content p-4">
                                        <h5 class="theme mb-1">{{ucwords($poet->name)}}</h5>
                                        <h4><a href="{{route('viewByPoet',$poet->id)}}" class="white">{{ucwords($poet->email)}}</a></h4>
                                        <div class="entry-meta d-flex align-items-center justify-content-between">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

@endsection
