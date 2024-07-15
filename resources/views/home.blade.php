@extends('layouts.front')

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
                                                        <div class="slide-image" style="background-image:url('{{$wSelected->getFirstMedia()->getUrl('thumb')}}')"></div>
                                                    @else
                                                        <div class="slide-image" style="background-image:url({{url('public/noImage.jpeg')}})"></div>
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
                                                        <div class="slide-image" style="background-image:url('{{$vSelected->getFirstMedia()->getUrl('thumb')}}')"></div>
                                                    @else
                                                        <div class="slide-image" style="background-image:url({{url('public/noImage.jpeg')}})"></div>
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
                    <h2 class="m-0">LATEST <span>POETRY</span> | <small>view All</small></h2>
                </div>
                <div class="featured-video-main">
                    <div class="row d-flex align-items-center">
                        @foreach($words as $word)
                            <div class="col-lg-3 mb-4">
                                <div class="featured-item">
                                    <div class="featured-image">
                                        @if($word->getFirstMedia())
                                            <img style="height: 350px;width: 100%;object-fit: cover" src="{{$word->getFirstMedia()->getUrl('thumb')}}" alt="{!!  strtoupper($word->title) !!}" class="w-100">
                                        @else
                                            <img style="height: 350px;width: 100%;object-fit: cover" src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($word->title) !!}" class="w-100">
                                        @endif
                                        <div class="color-overlay"></div>
                                    </div>
                                    <div class="featured-content-main">
                                        <div class="featured-content p-4">
                                            <h5 class="theme mb-1">{{$word->categoryName}}</h5>
                                            <h4><a href="{{route('viewWordPoet',$word->id)}}" class="white">{!!  strtoupper($word->title) !!}</a></h4>
                                            <p class="featured-para mb-2 white">
                                            <div class="entry-author">
                                                @if($word->photo == null && $word->getFirstMedia())
                                                    <img style="height: 350px;width: 100%;object-fit: cover" src="{{$word->getFirstMedia()->getUrl('thumb')}}" alt="{!!  strtoupper($word->title) !!}" class="rounded-circle me-1">
                                                @else
                                                    <img style="height: 350px;width: 100%;object-fit: cover" src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($word->title) !!}" class="rounded-circle me-1">
                                                @endif
                                                <span class="white" style="font-size: 10px">{{ucwords($word->userName)}}</span>
                                                <span class="white" style="font-size: 10px">{{ucwords($word->created_at)}}</span>
                                            </div>
                                            </p><hr>
                                            <div class="entry-meta d-flex align-items-center justify-content-between">
                                                <div class="entry-metalist d-flex align-items-center">
                                                    <ul>
                                                        <li class="me-2"><a href="{{route('viewWordPoet',$word->id)}}" class="white"><i class="fa fa-eye"></i> 5k</a></li>
                                                        <li class="me-2"><a href="{{route('viewWordPoet',$word->id)}}" class="white"><i class="fa fa-heart"></i> 5k</a></li>
                                                        <li><a href="{{route('viewWordPoet',$word->slug ?? 0)}}" class="white"><i class="fa fa-comments"></i> 5k</a></li>
                                                    </ul>
                                                </div>
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
    @endif

    @if(count($cardCategories))
        <section class="banner overflow-hidden pt-4">
            <div class="container">
                <div class="section-title mb-4 pb-1 w-50">
                    <h2 class="m-0">POETRIKA <span>CARDS</span></h2>
                </div>
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
                        <div class="col-lg-4 mb-4">
                            <div class="slider slider2">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @if(count($allCards))
                                            @foreach($allCards as $allCard)
                                                <div class="swiper-slide">
                                                    <div class="slide-inner">
                                                        @if($allCard->getFirstMedia())
                                                            <div class="slide-image" style="object-fit: contain; background-image:url('{{$allCard->getFirstMedia()->getUrl('thumb')}}')"></div>
                                                        @else
                                                            <div class="slide-image" style="background-image:url({{url('public/noImage.jpeg')}})"></div>
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
        <section class="featured-video bg-grey pb-5">
            <div class="container">
                <div class="section-title mb-4 pb-1 w-50">
                    <h2 class="m-0">POETRIKA <span>VIDEOS</span> | <small>view All</small></h2>
                </div>
                <div class="featured-video-main">
                    <div class="row d-flex align-items-center">
                        @foreach($videos as $video)
                            <div class="col-lg-4 mb-4">
                                <div class="trend-item box-shadow bg-white">
                                    <div class="trend-image" style="height: 300px">
                                        <iframe style="width: 100%; height: 100%; object-fit: contain" src="https://www.youtube.com/embed/{{$video->videoFile}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="trend-content-main">
                                        <div class="trend-content p-4">
                                            <h5 class="theme mb-1">{{ucwords($video->categoryName)}}</h5>
                                            <h4 class="mb-0"><a href="#">{{ucwords($video->title)}}</a></h4>
                                            <small style="font-size: 10px;"><strong>{{ date('d M ,Y', strtotime($video->created_at))." "." ( ".Carbon\Carbon::parse($video->created_at)->diffForHumans()." ) "  }}</strong></small>
                                            <hr>
                                            <div class="entry-meta d-flex align-items-center justify-content-between">
                                                <div class="entry-author">
                                                    <span>Rosalina D.</span>
                                                </div>
                                                <div class="entry-metalist d-flex align-items-center">
                                                    <ul>
                                                        <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 5k</a></li>
                                                        <li><a href="#"><i class="fa fa-comments"></i> 5k</a></li>
                                                    </ul>
                                                </div>
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
    @endif

    @if(count($audios))
        <section class="trending pt-0 ptop">
            <div class="container">
                <div class="section-title mb-4 pb-1 w-50"><br>
                    <h2 class="m-0">POETRIKA <span>AUDIOS</span> | <small>view All</small></h2>
                </div>
                <div class="trend-box">
                    <div class="row">
                        @foreach($audios as $audio)
                            <div class="col-lg-4 mb-4">
                                <div class="trend-item d-flex align-items-center box-shadow p-4">
                                    <div class="trend-content-main me-4 w-75">
                                        <div class="trend-content">
                                            <h5 class="theme mb-1">{{ucwords($audio->categoryName)}}</h5>
                                            <h4 class="mb-0"><a href="#">{{ucwords($audio->title)}}</a></h4><br>
                                            <h4>
                                                <a href="#">
                                                    <audio controls controlsList="nodownload" style="width: 100%">
                                                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/mpga">
                                                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/mp3">
                                                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/ogg">
                                                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/mpeg">
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
                                        @if($audio->getFirstMedia())
                                            <img src="{{$audio->getFirstMedia()->getUrl('thumb')}}" alt="{{ucwords($audio->title)}}">
                                        @else
                                            <img src="{{url('public/noImage.jpeg')}}" alt="{{ucwords($audio->title)}}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($books))
        <section class="featured-video pb-5 bg-grey">
            <div class="container">
                <div class="section-title mb-4 pb-1 w-50">
                    <h2 class="m-0">Poetrika <span>Books</span></h2>
                </div>
                <div class="featured-video-main">
                    <div class="row d-flex align-items-center">
                        @foreach($books as $book)
                            <div class="col-lg-3 mb-4">
                                <div class="featured-item">
                                    <div class="featured-image">
                                        @if($book->getFirstMedia())
                                            <img style="height: 450px;width: 100%;object-fit: cover" src="{{$book->getFirstMedia()->getUrl('thumb')}}" alt="{!!  strtoupper($book->bookName) !!}" class="w-100">
                                        @else
                                            <img style="height: 450px;width: 100%;object-fit: cover" src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($book->bookName) !!}" class="w-100">
                                        @endif
                                        <div class="color-overlay"></div>
                                    </div>
                                    <div class="featured-content-main">
                                        <div class="featured-content p-4">
                                            <h5 class="theme mb-1">{{ucwords($book->categoryName)}}</h5>
                                            <h4><a href="#" class="white">{{ucwords($book->bookName)}}</a></h4>
                                            <p class="featured-para mb-2 white">{!! \Illuminate\Support\Str::limit($book->description,120) !!}</p>
                                            <div class="entry-meta d-flex align-items-center justify-content-between">
                                                <div class="entry-author">
                                                    @if($book->photo == null && $book->getFirstMedia())
                                                        <img style="height: 350px;width: 100%;object-fit: cover" src="{{$book->getFirstMedia()->getUrl('thumb')}}" alt="{!!  strtoupper($book->bookName) !!}" class="rounded-circle me-1">
                                                    @else
                                                        <img style="height: 350px;width: 100%;object-fit: cover" src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($book->bookName) !!}" class="rounded-circle me-1">
                                                    @endif
                                                </div>
                                                <div class="entry-metalist d-flex align-items-center">
                                                    <ul>
                                                        <li class="me-2"><a href="#" class="white"><i class="fa fa-eye"></i> 5k</a></li>
                                                        <li class="me-2"><a href="#" class="white"><i class="fa fa-heart"></i> 5k</a></li>
                                                        <li><a href="#" class="white"><i class="fa fa-comments"></i> 5k</a></li>
                                                    </ul>
                                                </div>
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
    @endif

    <section class="discount-action bg-white pbottom pt-0">
        <div class="container">
            <div class="section-title mb-4 pb-1 w-50"><br>
                <h2 class="m-0">Who is <span>Maria</span></h2>
            </div>
            <div class="call-banner" style="background-image: url({{asset('front/images/bg/bg1.jpg')}});">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-md-7 p-0">
                        <div class="call-banner-inner bg-theme">
                            <div class="trend-content-main">
                                <div class="trend-content p-4">
                                    <h5 class="px-0 mb-1 white"></h5>
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
                </ul>
            </div>
        </div>
    </section>

@endsection
