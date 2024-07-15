@extends('layouts.app')

@section('content')

    <div class="page-cover pt-5">
        <div class="container">
            <div class="section-title mb-4 pb-1 w-50">
                <h2 class="m-0">POETRIKA <span>CARDS</span></h2>
            </div>
        </div>
    </div>

    @if(count($cardCategories))
        <section class="banner overflow-hidden pt-4">
            <div class="container">
                <div class="row">
                    @foreach($cardCategories as $cardCategory)
                        <?php

                        $nameCategoryId = \App\models\Category::select('id')
                            ->where('name',$cardCategory->name)
                            ->first();

                        $allCards     = \App\models\Card::select('cards.*','categories.name as categoryName')
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
                                                        <div class="slide-image" style="background-image:url({{asset('/cards/'.$allCard->card)}})"></div>
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
@endsection
