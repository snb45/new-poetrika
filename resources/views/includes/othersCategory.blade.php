
<aside id="sidebar">

    <!-- BEGIN .widget -->
    <div class="widget">
        <h3>{{strtolower(ucwords('OTHER CATEGORIES'))}}</h3>
        <div class="widget-content ot-w-socialize">
            @foreach($categories as $category)
                <a href="{{route('viewPoetryByCategories',$category->id)}}" class="ot-color-hover-facebook"><i class="fa fa-arrow-circle-right"></i><span style="font-size: 11px">{{strtoupper($category->name)}}</span></a>
            @endforeach
        </div>
    </div>

    <!-- BEGIN .widget -->
    <div class="widget">
        <div class="widget-content">
            <a href="#" target="_blank"><img src="{{asset('home/images/ads.jpg')}}" alt="" /></a>
        </div>
    </div>


    <div class="widget">
        <h3>{{strtolower(ucwords('VIDEOS RELATED'))}}</h3>
        <div class="widget-content ot-w-socialize">

            @if(count($videos))
                @foreach($videos as $video)
                    <a href="{{route('viewPoet',$video->id)}}" class="ot-color-hover-facebook"><i class="fa fa-play-circle"></i><span style="font-size: 11px">{!! ucwords($video->title) !!}</span></a>
                @endforeach
            @else
                <div class="item">
                    <div class="item-content">
                        <h4>No Videos Related</h4>
                    </div>
                </div>
            @endif

            @foreach($categories as $category)
            @endforeach
        </div>
    </div>


    <!-- BEGIN .widget -->
    <div class="widget">
        <h3>Card Related</h3>
        <div class="widget-content ot-w-gallery-list">

            @if(count($cards))
                <div class="item">
                    <div class="item-header">
                        @foreach($cards as $card)
                            <div class="item-photo"><a href="{{route('viewCards',$card->category)}}"><img src="{{asset('/cards/'.$card->card)}}" style="object-fit: cover; height: 300px" alt="" /></a></div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="item">
                    <div class="item-content">
                        <h4>No Cards Related</h4>
                    </div>
                </div>
            @endif

        </div>
        <!-- END .widget -->
    </div>

    <!-- END #sidebar -->
</aside>
