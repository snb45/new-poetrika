
<div class="content">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="composs-main-content composs-main-content-s-1">
                <div class="composs-panel">

                    <div class="ot-shortcode-tabs style-2">
                        <ul>
                            <li  class="active"><a href="#"><i class="fa fa-image"></i>Cards</a></li>
                            <li><a href="#"><i class="fa fa-play"></i>Video</a></li>
                            <li><a href="#"><i class="fa fa-file-audio-o"></i>Audio</a></li>
                            <li><a href="#"><i class="fa fa-file-text"></i>Word</a></li>
                            <li><a href="#"><i class="fa fa-book"></i>Books</a></li>
                        </ul>

                        <div>
                            @if(count($cards))
                                <div class="composs-panel-inner">
                                    <div class="composs-blog-list lets-do-3">
                                        @foreach($cards as $card)
                                            <div class="item">
                                                <div class="item-header">
                                                    <a href="{{route('viewUserCards',$card->userId)}}" class="img-read-later-button">View more {{ucwords($card->userName.'\'s')}} Cards</a>
                                                    <a href="{{route('viewUserCards',$card->userId)}}"><img src="{{asset('/cards/'.$card->card)}}" alt="{!!  strtoupper($card->name) !!}" style="height: 350px; object-fit: cover"/></a>
                                                </div>
                                                <div class="item-content">
{{--                                                    <h2><a href="{{route('viewUserCards',$card->userId)}}">( By - {{ucwords($card->userName)}} )</a></h2>--}}
                                                    <span class="item-meta-item"><i class="material-icons">access_time</i>{{date('d M, Y' , strtotime($card->created_at))}}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="no_comments">
                                    <i class="la la-file-image-o-o"></i>
                                    <div>
                                        <h4>No Cards Yet!</h4>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div>
                            <div class="composs-panel-inner">
                                <div class="composs-blog-list lets-do-3">
                                    @if(count($videos))
                                        @foreach($videos as $video)
                                            <div class="item">
                                                <div class="item-header">
                                                    <a href="#" class="img-read-later-button">Read later</a>
                                                    <a href="{{route('viewPoet',$video->id)}}">
                                                        <img src="{{asset('/videos/'.$video->displayImage)}}" style="height: 150px; object-fit: cover" alt="{!!  strtoupper($video->title) !!}" />
                                                    </a>
                                                </div>
                                                <div class="item-content">
                                                    <h2><a href="{{route('viewPoet',$video->id)}}">{!!  strtoupper($video->title) !!}</a></h2>
                                                    <span class="item-meta">
                                                    <span class="item-meta-item">( By - {{ucwords($video->userName)}} )</span>
                                                </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="no_comments">
                                            <i class="fa fa-file-video-o"></i>
                                            <div>
                                                <h4>No Video Yet!</h4>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="composs-panel-inner">
                                <div class="composs-blog-list lets-do-1">
                                    @if(count($audios))
                                        @foreach($audios as $audio)
                                            <div class="item">
                                                @if($audio->displayImage != null)
                                                    <div class="item-header">
                                                        <a href=""><img src="{{asset('/audios/'.$audio->displayImage)}}" style="height: 250px; object-fit: cover" alt="" /></a>
                                                    </div>
                                                @endif
                                                <div class="item-content">
                                                    <h2><a href="">{!! ucwords($audio->title) !!}</a></h2>
                                                    <audio controls controlsList="nodownload" style="width: 100%">
                                                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/mpga">
                                                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/mp3">
                                                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/ogg">
                                                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/mpeg">
                                                        Your browser does not support the audio tag.
                                                    </audio>
                                                </div>
                                                <div class="item-content">
                                                        <span class="item-meta">
                                                            <span class="item-meta-item"><i class="material-icons">access_time</i>{{ date('d M ,Y', strtotime($audio->created_at)) }}</span>
                                                        </span>
                                                    <p>{!! $audio->descriptions !!}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <section class="main-content pb-0">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="about-cont">
                                                            <h2><i class="la la-file-audio-o"></i> No Audio Yet!</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="composs-panel-inner">
                                <div class="composs-blog-list lets-do-3">
                                    @if(count($words))
                                        @foreach($words as $word)
                                            <div class="item">
                                                <div class="item-header">
                                                    <a href="{{route('viewWordPoet',$word->id)}}" class="img-read-later-button">Read later</a>
                                                    <a href="{{route('viewWordPoet',$word->id)}}">
                                                        <img style="height: 250px; object-fit: cover" src="{{asset('/words/'.$word->displayImage)}}" alt="{!!  strtoupper($word->title) !!}" />
                                                    </a>
                                                </div>
                                                <div class="item-content">
                                                    <h2><a href="{{route('viewWordPoet',$word->id)}}">{!!  strtoupper($word->title) !!}</a></h2>
                                                    <span class="item-meta">
                                                    <span class="item-meta-item">( By - {{ucwords($word->userName)}} )</span>
                                                </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="no_comments">
                                            <i class="la la-file-text-o"></i>
                                            <div>
                                                <h4>No Words Yet!</h4>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="composs-main-content">
                                <div class="composs-panel">
                                    <div class="composs-panel-inner">
                                        <div class="composs-archive-list lets-do-1">
                                            <div class="item">
                                                <div class="ot-w-article-list">
                                                    @if(count($books))
                                                    @foreach($books as $book)
                                                        <div class="item">
                                                            <div class="item-header">
                                                                <img src="{{asset('/books/'.$book->cover)}}" style="height: 100px; object-fit: cover"  alt="">
                                                            </div>
                                                            <div class="item-content">
                                                                <h2>{{ucwords($book->bookName)}}</h2>
                                                                <span class="item-meta">
                                                                <p>{!! substr($book->description,0,200) !!}</p><br>
                                                                <span class="item-meta-item"><i class="material-icons">access_time</i>{{ date('d M ,Y', strtotime($book->created_at))." "." ( ".Carbon\Carbon::parse($book->created_at)->diffForHumans()." ) "  }}</span><br><br>
                                                                <a href="{{asset('/books/'.$book->link)}}" target="_blank" class="btn btn-secondary" style="background-color: #0a121c; color: white">Download</a>
                                                            </span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                        @else
                                                            <div class="no_comments">
                                                                <i class="la la-book"></i>
                                                                <div>
                                                                    <h4>No Books Yet!</h4>
                                                                </div>
                                                            </div>
                                                        @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            @include('includes.othersCategory')
        </div>
    </div>
</div>



