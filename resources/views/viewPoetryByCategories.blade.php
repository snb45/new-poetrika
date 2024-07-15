@extends('layouts.app')

@section('content')

    <section class="trending pb-5 pt-120 ptop">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="section-title mb-4 pb-1 w-100">
                        <h2 class="m-0">Category: <span>{{ucwords($categoryName->name)}}</span></h2><br>
                    </div>
                    <div class="post-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                    <i class="fa fa-image"></i> | Cards
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab" aria-controls="video" aria-selected="false">
                                    <i class="fa fa-play"></i> | Videos
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="audio-tab" data-bs-toggle="tab" data-bs-target="#audio" type="button" role="tab" aria-controls="audio" aria-selected="false">
                                    <i class="fa fa-file-audio-o"></i> | Audios
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="word-tab" data-bs-toggle="tab" data-bs-target="#word" type="button" role="tab" aria-controls="word" aria-selected="false">
                                    <i class="fa fa-file-text"></i> | Words
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="book-tab" data-bs-toggle="tab" data-bs-target="#book" type="button" role="tab" aria-controls="book" aria-selected="false">
                                    <i class="fa fa-book"></i> | Books
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                @if(count($cards))
                                    <div class="gallery pt-0 pb-6">
                                        <div class="container">
                                            <div class="row mt-3">
                                                @foreach($cards as $card)
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <div class="gallery-item mb-4">
                                                            <div class="gallery-image">
                                                                @if($card->getFirstMedia())
                                                                    <img style="height: 300px;width: 100%;object-fit: cover" src="{{$card->getFirstMedia()->getUrl('thumb')}}" alt="{!!  strtoupper($card->name) !!}" class="w-100">
                                                                @else
                                                                    <img style="height: 300px;width: 100%;object-fit: cover" src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($card->name) !!}" class="w-100">
                                                                @endif
                                                                <div class="overlay"></div>
                                                            </div>
                                                            <div class="gallery-content">
                                                                <ul>
                                                                    @if($card->getFirstMedia())
                                                                        <li><a href="{{$card->getFirstMedia()->getUrl('thumb')}}" data-lightbox="gallery" data-title="Title"><i class="fa fa-eye"></i></a></li>
                                                                    @else
                                                                        <li><a href="{{url('public/noImage.jpg')}}" data-lightbox="gallery" data-title="Title"><i class="fa fa-eye"></i></a></li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <section class="top-post pt-0">
                                        <div class="container">
                                            <hr>
                                            <div class="section-title mb-4 pb-1 w-50">
                                                <h2 class="m-0">No <span>Cards Yet!</span></h2>
                                            </div>
                                        </div>
                                    </section>
                                @endif
                            </div>

                            <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                                @if(count($videos))
                                    <section class="featured-video pb-5 bg-grey">
                                        <div class="container">
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @else
                                    <section class="top-post pt-0">
                                        <div class="container">
                                            <hr>
                                            <div class="section-title mb-4 pb-1 w-50">
                                                <h2 class="m-0">No <span>Video Yet!</span></h2>
                                            </div>
                                        </div>
                                    </section>
                                @endif
                            </div>

                            <div class="tab-pane fade" id="audio" role="tabpanel" aria-labelledby="audio-tab">
                                @if(count($audios))
                                    <section class="trending pt-0 ptop">
                                        <div class="container">
                                            <div class="trend-box">
                                                <div class="row">
                                                    @foreach($audios as $audio)
                                                        <div class="col-lg-4 mb-4">
                                                            <div class="trend-item d-flex align-items-center box-shadow p-4">
                                                                <div class="trend-content-main me-4 w-100">
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
                                                                                @if($audio->getFirstMedia())
                                                                                    <img style="width: 100%;object-fit: cover" src="{{$audio->getFirstMedia()->getUrl('thumb')}}" alt="{{ucwords($audio->title)}}" class="rounded-circle me-1">
                                                                                @else
                                                                                    <img style="width: 100%;object-fit: cover" src="{{url('public/noImage.jpeg')}}" alt="{{ucwords($audio->title)}}" class="rounded-circle me-1">
                                                                                @endif
                                                                                <span>{{ucwords($audio->categoryName)}}</span>
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
                                @else
                                    <section class="top-post pt-0">
                                        <div class="container">
                                            <hr>
                                            <div class="section-title mb-4 pb-1 w-50">
                                                <h2 class="m-0">No <span>Audio Yet!</span></h2>
                                            </div>
                                        </div>
                                    </section>
                                @endif
                            </div>

                            <div class="tab-pane fade" id="word" role="tabpanel" aria-labelledby="word-tab">
                                @if(count($words))
                                    <section class="featured-video pb-5 bg-grey">
                                        <div class="container">
                                            <div class="featured-video-main">
                                                <div class="row d-flex align-items-center">
                                                    @foreach($words as $word)
                                                        <div class="col-lg-4 mb-4">
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
                                @else
                                    <section class="top-post pt-0">
                                        <div class="container">
                                            <hr>
                                            <div class="section-title mb-4 pb-1 w-50">
                                                <h2 class="m-0">No <span>Words Yet!</span></h2>
                                            </div>
                                        </div>
                                    </section>
                                @endif
                            </div>

                            <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">
                                @if(count($books))
                                    <section class="featured-video pb-5 bg-grey">
                                        <div class="container">
                                            <div class="featured-video-main">
                                                <div class="row d-flex align-items-center">
                                                    @foreach($books as $book)
                                                        <div class="col-lg-4 mb-4">
                                                            <div class="featured-item">
                                                                <div class="featured-image">
                                                                    @if($book->getFirstMedia())
                                                                        <img style="height: 400px;width: 100%;object-fit: cover" src="{{$book->getFirstMedia()->getUrl('thumb')}}" alt="{!!  strtoupper($book->bookName) !!}" class="w-100">
                                                                    @else
                                                                        <img style="height: 400px;width: 100%;object-fit: cover" src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($book->bookName) !!}" class="w-100">
                                                                    @endif
                                                                    <div class="color-overlay"></div>
                                                                </div>
                                                                <div class="featured-content-main">
                                                                    <div class="featured-content p-4">
                                                                        <h5 class="theme mb-1">{{ucwords($book->categoryName)}}</h5>
                                                                        <h4><a href="#" class="white">{{ucwords($book->bookName)}}</a></h4>
                                                                        <p class="featured-para mb-2 white">{!! \Illuminate\Support\Str::limit($book->description,110) !!}</p>
                                                                        <div class="entry-meta d-flex align-items-center justify-content-between">
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
                                @else
                                    <section class="top-post pt-0">
                                        <div class="container">
                                            <hr>
                                            <div class="section-title mb-4 pb-1 w-50">
                                                <h2 class="m-0">No <span>Books Yet!</span></h2>
                                            </div>
                                        </div>
                                    </section>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="sidebar-sticky">
                        <div class="list-sidebar">
                            <div class="sidebar-item mb-4">
                                <h4 class="">All Categories</h4>
                                <ul class="sidebar-category">
                                    @foreach($categories as $category)
                                        <li style="font-size: 13px" @if($category->id == $categoryName->category) class="active" @endif><a href="{{route('viewPoetryByCategories',$category->id)}}">{{strtoupper($category->name)}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
