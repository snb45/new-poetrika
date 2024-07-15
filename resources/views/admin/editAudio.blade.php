@extends('layouts.master')

@section('title') Audio Poets @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Audio Poets  @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Audio</h4>
                    <hr>
                    <form action="{{route('updateAudio',$audio->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="mb-4 col-lg-12">
                                @if($audio->getFirstMedia())
                                    <img src="{{$audio->getFirstMedia()->getUrl('thumb')}}" style="height: 250px;width: 100%;object-fit: contain" class="rounded-circle header-profile-user" alt="{{ucwords($audio->title)}}">
                                @else
                                    <img src="{{url('public/noImage.jpeg')}}" style="height: 250px;width: 100%;object-fit: contain" class="rounded-circle header-profile-user" alt="{{ucwords($audio->title)}}">
                                @endif
                            </div>

                            <div class="mb-4 col-lg-6">
                                <h4 class="card-title">Choose Display Image</h4>
                                <p class="card-title-desc">Only PNG,JPG,JPEG Format is Allowed.</p>
                                <input type="file" id="" name="displayImage" >
                            </div>

                            <div class="mb-4 col-lg-6">
                                <h4 class="card-title">Choose Audio</h4>
                                <p class="card-title-desc">Only MP3/mpga Format is Allowed.</p>
                                <input type="file" required id="" name="audioFile" >
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="control-label" class="">Title</label>
                                    <input type="text" required name="title" class="form-control" value="{{$audio->title}}" placeholder="title" />
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
                                    <textarea id="mytextarea" name="about" class="form-control" placeholder="About Poet">{{$audio->descriptions}}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 pull-right">
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark waves-effect waves-light btn-block" value="Save Audio" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h2 style="font-weight: bold; text-align: center">{!! ucwords($audio->title)!!}</h2>
                    <p class="card-title-desc">{!! substr($audio->descriptions,0,200) !!}</p><hr>
                    <p class="card-title-desc">DATE : {{ date('d M ,Y', strtotime($audio->created_at))." "." (".Carbon\Carbon::parse($audio->created_at)->diffForHumans().") "  }}</p><hr>
                    <p class="card-title-desc">CATEGORY : {{ucwords($audio->categoryName)}}</p><hr>
                    <audio controls controlsList="nodownload" style="width: 100%">
                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/mpga">
                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/mp3">
                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/ogg">
                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/mpeg">
                        Your browser does not support the audio tag.
                    </audio>
                </div>
            </div>
        </div>
    </div>

@endsection
