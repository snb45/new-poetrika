@extends('layouts.master')

@section('title') Video Poets @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Video Poets  @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Video</h4>
                    <hr>

                    <form action="{{route('saveVideo')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="control-label" class="">Title</label>
                                    <input id="title" required name="title" class="form-control" placeholder="title" />
                                </div>
                            </div>

                            <div class="mb-4 col-lg-6">
                                <h4 class="card-title">Paste Youtube Link</h4>
                                <input id="YoutubeLink" required name="youtubeLink" class="form-control" placeholder="Youtube Link" />
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="control-label" class="">Display Image</label>
                                    <input type="file" name="banner" class="form-control" placeholder="banner" />
                                </div>
                            </div>

                            <div class="mb-4 col-lg-6">
                                <label class="control-label">Poet Category</label>
                                <select name="category" class="form-control">
                                    <option>Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="control-label" class="">About Poet</label>
                                    <textarea id="mytextarea" name="about" class="form-control" placeholder="About Poet"></textarea>
                                </div>
                            </div>

                            <div class="progress mt-3" style="height: 25px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0; height: 100%">0%</div>
                            </div>
                        </div>

                        <div class="col-md-4 pull-right">
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark waves-effect waves-light btn-block" value="Save Video" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        @foreach($videos as $video)
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h2 style="font-weight: bold; text-align: center">{!! ucwords($video->title)!!}</h2>
                    <p class="card-title-desc">DATE : {{ date('d M ,Y', strtotime($video->created_at))." "." (".Carbon\Carbon::parse($video->created_at)->diffForHumans().") "  }}</p>
                    <p class="card-title-desc">CATEGORY : {{ucwords($video->categoryName)}}</p>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe style="width: 100%; height: 100%; object-fit: contain" src="https://www.youtube.com/embed/{{$video->videoFile}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                @if(Auth::user()->role == "admin")
                    <div class="card">
                        <div class="card-body">
                            @if($video->status == 0)
                                <a href="{{route('approveVideo',$video->id)}}" class="btn btn-success waves-effect btn-sm waves-light">Approve</a>
                            @else
                                <a href="{{route('disApproveVideo',$video->id)}}" class="btn btn-danger waves-effect btn-sm waves-light">Dis Approve</a>
                            @endif

                            @if(Auth::user()->role == "admin")
                               @if($video->selected == 0)
                                    <a href="{{route('poetOfTheWeekVideo',$video->id)}}" class="btn btn-secondary btn-sm">Make poet of the week</a><br><hr>
                               @else
                                    <p class="btn btn-success btn-sm">{{ucwords('selected poet of the week')}}</p><br><hr>
                               @endif
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

@endsection
