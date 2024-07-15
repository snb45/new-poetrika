@extends('layouts.app')

@section('content')
    @foreach($cards as $name) @endforeach
    <div class="page-cover pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mb-4">
                    <div class="cover-content">
                        <h1>{{ucwords($name->userName.'\'s')}} Cards ( {{count($cards)}} )</h1>
                        <div class="author-detail mb-2">
                            <a href="{{route('cardsPost')}}" class="tag white bg-theme py-1 px-3 me-2">{{ucwords("back to All Cards")}}</a>
                            <a href="{{route('viewByPoet',$name->userId)}}" class="tag white bg-navy py-1 px-3"><i class="fa fa-user"></i> | More From {{ucwords($name->userName)}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery pt-0 pb-6">
        <div class="container">
            <div class="row mt-3">
                @foreach($cards as $card)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="gallery-item mb-4">
                            <div class="gallery-image">
                                <img src="{{asset('/cards/'.$card->card)}}" alt="image">
                                <div class="overlay"></div>
                            </div>
                            <div class="gallery-content">
                                <ul>
                                    <li><a href="{{asset('/cards/'.$card->card)}}" data-lightbox="gallery" data-title="Title"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center" style="width: 100%; margin: auto">
                {{$cards->links()}}
            </div>
        </div>
    </div>

@endsection
