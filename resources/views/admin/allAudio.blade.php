@extends('layouts.master')

@section('title') Audio Poets @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Audio Poets  @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <div class="row">
        @foreach($audios as $audio)
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h2 style="font-weight: bold; text-align: center">{{ucwords($audio->title)}}</h2>
                    <p class="card-title-desc">{!! substr($audio->descriptions,0,200) !!}</p><hr>
                    <p class="card-title-desc">DATE : {{ date('d M ,Y', strtotime($audio->created_at))." "." (".Carbon\Carbon::parse($audio->created_at)->diffForHumans().") "  }}</p><hr>
                    <p class="card-title-desc">CATEGORY : {{ucwords($audio->categoryName)}}</p><hr>
                    <audio controls controlsList="nodownload" style="width: 100%">
                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/mpga">
                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/mp3">
                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/ogg">
                        <source src="{{asset('/audios/'.$audio->audioFile)}}" type="audio/mpeg">
                        Your browser does not support the audio tag.
                    </audio>
                </div>
            </div>

            @if(Auth::user()->role == "admin")
                <div class="card">
                    <div class="card-body">
                        @if($audio->status == 0)
                            <a href="{{route('approveAudio',$audio->id)}}" class="btn btn-success waves-effect waves-light btn-block">Approve</a>
                        @else
                            <a href="{{route('disApproveAudio',$audio->id)}}" class="btn btn-danger waves-effect waves-light btn-block">Dis Approve</a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        @endforeach
    </div>
@endsection
