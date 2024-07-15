@extends('layouts.app')

@section('content')

    @if(count($findSelectedWord))
        <section class="banner overflow-hidden pt-4 pbottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider slider1">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @if(count($findSelectedWord))
                                        @foreach($findSelectedWord as $wSelected)
                                            <div class="swiper-slide">
                                                <div class="slide-inner">
                                                    @if($wSelected->getFirstMedia())
                                                        <div class="slide-image" loading="lazy" data-src="{{$wSelected->getFirstMediaUrl()}}"></div>
                                                    @else
                                                        <div class="slide-image" loading="lazy" data-src="{{url('public/noImage.jpeg')}}" ></div>
                                                    @endif
                                                    <div class="swiper-content">
                                                        <div class="entry-meta d-flex align-items-center justify-content-between">
                                                            <span class="entry-category me-2 white bg-theme py-1 px-3"><a href="{{route('viewWordPoet',$wSelected->id)}}" class="white">{{$wSelected->categoryName}}</a></span>
                                                            <span class="entry-date"><i class="fa fa-calendar-alt"></i>{{ date('d M ,Y', strtotime($wSelected->created_at))." "." ( ".Carbon\Carbon::parse($wSelected->created_at)->diffForHumans()." ) "  }}</span>
                                                        </div>
                                                        <h1 class="mb-2"><a href="#">{!! ucwords($wSelected->title) !!}</a></h1>
                                                        <div class="entry-meta d-flex align-items-center justify-content-between">
                                                            <div class="entry-author">
                                                                <span><a href="{{route('viewWordPoet',$wSelected->id)}}">{{$wSelected->userName}}</a></span>
                                                            </div>
                                                            <div class="entry-metalist d-flex align-items-center">
                                                                <ul>
                                                                    <li class="me-2"><a href="#"><i class="fa fa-eye"></i> 5k</a></li>
                                                                    <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 5k</a></li>
                                                                    <li><a href="#"><i class="fa fa-comments"></i> 5k</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="overlay"></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif

                                    @if(count($findSelectedVideo))
                                        @foreach($findSelectedVideo as $vSelected)
                                            <div class="swiper-slide">
                                            <div class="slide-inner">
                                                @if($vSelected->getFirstMedia())
                                                    <div class="slide-image" loading="lazy" data-src="{{$vSelected->getFirstMediaUrl()}}"></div>
                                                @else
                                                    <div class="slide-image" loading="lazy" data-src="{{url('public/noImage.jpeg')}}" ></div>
                                                @endif
                                                    <div class="swiper-content">
                                                        <div class="entry-meta d-flex align-items-center justify-content-between">
                                                            <span class="entry-category me-2 white bg-theme py-1 px-3"><a href="{{route('viewPoet',$vSelected->id)}}" class="white">{{$vSelected->categoryName}}</a></span>
                                                            <span class="entry-date"><i class="fa fa-calendar-alt"></i>{{ date('d M ,Y', strtotime($vSelected->created_at))." "." ( ".Carbon\Carbon::parse($vSelected->created_at)->diffForHumans()." ) "  }}</span>
                                                        </div>
                                                        <h1 class="mb-2"><a href="{{route('viewPoet',$vSelected->id)}}">{!! ucwords($vSelected->title) !!}</a></h1>
                                                        <div class="entry-meta d-flex align-items-center justify-content-between">
                                                            <div class="entry-author">
                                                                <span><a href="{{route('viewPoet',$vSelected->id)}}">{{$vSelected->userName}}</a></span>
                                                            </div>
                                                            <div class="entry-metalist d-flex align-items-center">
                                                                <ul>
                                                                    <li class="me-2"><a href="#"><i class="fa fa-eye"></i> 5k</a></li>
                                                                    <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 5k</a></li>
                                                                    <li><a href="#"><i class="fa fa-comments"></i> 5k</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="overlay"></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($words))
        <section class="featured-video pb-5 bg-grey">
            <div class="container">
                <div class="section-title mb-4 pb-1 w-50">
                    <h2 class="m-0">LATEST <span>POETRY</span></h2>
                </div>
                <div class="featured-video-main">
                    <div class="row d-flex align-items-center">
                        @foreach($words as $word)
                            <div class="col-lg-4 mb-4">
                                <div class="featured-item">
                                    <div class="featured-image">
                                        @if($word->getFirstMedia())
                                            <img style="height: 500px;width: 100%;object-fit: cover" loading="lazy" src="{{$word->getFirstMediaUrl()}}" alt="{!!  strtoupper($word->title) !!}" class="w-100">
                                        @else
                                            <img style="height: 500px;width: 100%;object-fit: cover" loading="lazy" src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($word->title) !!}" class="w-100">
                                        @endif
                                        <div class="color-overlay"></div>
                                    </div>
                                    <div class="featured-content-main">
                                        <div class="featured-content p-4">
                                            <h5 class="theme mb-1">{{$word->categoryName}}</h5>
                                            <h4><a href="{{route('viewWordPoet',$word->id)}}" class="white">{!!  strtoupper($word->title) !!}</a></h4>
                                            <p class="featured-para mb-2 white">
                                                <div class="entry-author">
                                                    <img src="
                                                        @if($word->photo == null)
                                                            {{url('public/noImage.jpeg')}}
                                                        @else
                                                            {{asset('/profiles/'.$word->photo)}}
                                                        @endif" alt="{{ucwords($word->userName)}}" class="rounded-circle me-1">
                                                    <span class="white">{{ucwords($word->userName)}}</span>
                                                </div>
                                            </p><hr>
                                            <div class="entry-meta d-flex align-items-center justify-content-between">
                                                <div class="entry-metalist d-flex align-items-center">
                                                    <ul>
                                                        <li class="me-2"><a href="{{route('viewWordPoet',$word->id)}}" class="white"><i class="fa fa-eye"></i> 5k</a></li>
                                                        <li class="me-2"><a href="{{route('viewWordPoet',$word->id)}}" class="white"><i class="fa fa-heart"></i> 5k</a></li>
                                                        <li><a href="{{route('viewWordPoet',$word->id)}}" class="white"><i class="fa fa-comments"></i> 5k</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12 mb-4">
                            <div class="featured-item">
                                <button>Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($cardCategories))
        <section class="banner overflow-hidden pt-4">
            <div class="container">
                <div class="row">
                    @foreach($cardCategories as $cardCategory)
                        <?php

                        $nameCategoryId = \App\Models\Category::select('id')
                            ->where('name',$cardCategory->name)
                            ->first();

                        $allCards     = \App\Models\Card::select('cards.*','categories.name as categoryName')
                            ->join('categories','categories.id','=','cards.category')
                            ->where('cards.category',$nameCategoryId->id)
                            ->take(10)
                            ->get();

                        ?>
                        <div class="col-lg-6 mb-4">
                            <div class="slider slider2">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @if(count($allCards))
                                            @foreach($allCards as $allCard)
                                                <div class="swiper-slide">
                                                    <div class="slide-inner">
                                                        @if($allCard->getFirstMedia())
                                                            <div class="slide-image" loading="lazy" data-src="{{$allCard->getFirstMediaUrl()}}"></div>
                                                        @else
                                                            <div class="slide-image" loading="lazy" data-src="{{url('public/noImage.jpeg')}}" ></div>
                                                        @endif
                                                        <div class="swiper-content">
                                                            <div class="entry-meta d-flex align-items-center justify-content-between mb-2">
                                                                <span class="entry-category me-2 white bg-theme py-1 px-3"><a href="{{route('viewCards',$nameCategoryId->id)}}" class="white">Show more {{ucwords($cardCategory->name.'\'s')}} Card @if(count($allCards) > 1)( {{count($allCards)."+"}} ) @else {{"(1)"}} @endif</a></span>
                                                            </div>
                                                        </div>
                                                        <div class="color-overlay"></div>
                                                    </div>
                                                </div>
                                            @endforeach
                                       @else
                                          <a href="{{route('viewCards',$nameCategoryId->id)}}"><img src="{{url('public/noImage.jpeg')}}" style="object-fit: cover; height: 300px" alt="" /></a>
                                       @endif
                                    </div>
{{--                                    <div class="swiper-button-next"></div>--}}
{{--                                    <div class="swiper-button-prev"></div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    @if(count($videos))
        <section class="top-post pt-0">
            <div class="container">
                <div class="section-title mb-4 pb-1 w-50">
                    <h2 class="m-0">POETRIKA <span>VIDEOS</span></h2>
                </div>
                <div class="row team-slider">
                    @foreach($videos as $video)
                        <div class="col-lg-4">
                            <div class="trend-item">
                                <div class="trend-image">
                                    <iframe style="width: 100%; height: 100%; object-fit: contain" src="https://www.youtube.com/embed/{{$video->videoFile}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div class="trend-content"><hr>
                                        <h5 class="theme">{!!  strtoupper($video->title) !!}</h5>
                                        <div class="entry-meta d-flex align-items-center justify-content-between">
                                            <div class="entry-author d-flex align-items-center">
                                                <h3><a href="{{route('viewPoet',$video->id)}}"><i class="fa fa-play-circle"></i></a> </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <br>

    <section class="discount-action bg-white pbottom pt-0">
        <div class="container">
            <div class="call-banner" style="background-image: url({{asset('front/images/bg/bg1.jpg')}});">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-md-7 p-0">
                        <div class="call-banner-inner bg-theme">
                            <div class="trend-content-main">
                                <div class="trend-content p-4">
                                    <h5 class="px-0 mb-1 white">Who is Maria</h5>
                                    <h2 class="mb-2"><a href="#" class="white">Learn More About the founder of Poetrika.
                                        Who is she? dont you wonder?</a></h2>
                                    <a href="#" class="main-btn">View Details <i class="fa fa-arrow-right white pl-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 p-0"></div>
                </div>
            </div>
            <div class="social-wrapper bg-white p-4">
                <ul class="social-with-text d-flex align-items-center justify-content-between">
                    <li class="twitter"><a href="#"><i class="fab fa-twitter"></i><span>Twitter</span></a></li>
                    <li class="facebook"><a href="#"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                    <li class="instagram"><a href="#"><i class="fab fa-instagram"></i><span>Instagram</span></a></li>
                    <li class="youtube"><a href="#"><i class="fab fa-youtube"></i><span>Youtube</span></a></li>
                    <li class="pinterest"><a href="#"><i class="fab fa-pinterest"></i><span>Pinterest</span></a></li>
                    <li class="discord"><a href="#"><i class="fab fa-discord"></i><span>Discord</span></a></li>
                </ul>
            </div>
        </div>
    </section>

    @if(count($audios))
        <section class="trending pt-0 ptop">
            <div class="container">
                <div class="section-title mb-4 pb-1 w-50"><br>
                    <h2 class="m-0">POETRIKA <span>AUDIOS</span></h2>
                </div>
                <div class="trend-box">
                    <div class="row">
                        @foreach($audios as $audio)
                            <div class="col-lg-4 mb-4">
                                <div class="trend-item d-flex align-items-center box-shadow p-4">
                                    <div class="trend-content-main me-4 w-75">
                                        <div class="trend-content">
                                            <h5 class="theme">{!! ucwords($audio->title) !!}</h5>
                                            <h4>
                                                <a href="#">
                                                    <audio controls controlsList="nodownload" style="width: 100%">
                                                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/mpga">
                                                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/mp3">
                                                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/ogg">
                                                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/mpeg">
                                                        Your browser does not support the audio tag.
                                                    </audio>
                                                </a>
                                            </h4>
                                            <div class="entry-meta d-flex align-items-center justify-content-between">
                                                <div class="entry-author">
                                                    <img src="@if($audio->userPhoto == null)
                                                        {{url('public/noImage.jpeg')}}
                                                    @else
                                                        {{asset('/profiles/'.$audio->userPhoto)}}
                                                    @endif" alt="{{ucwords($audio->userName)}}" class="rounded-circle me-1">
                                                    <span>{{ucwords($audio->userName)}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="trend-image w-25">
                                        <img src="{{asset('/audios/'.$audio->displayImage)}}" alt="image">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div class="trend-btn text-center"><a href="#" class="nir-btn">Load More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
