@extends('layouts.app')

@section('content')

    <div class="page-cover pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <div class="cover-content">
                        <div class="author-detail mb-2">
                            <a href="#" class="tag white bg-theme py-1 px-3 me-2">#{{ucwords($poet->name)}}</a>
                            <a href="#" class="tag white bg-navy py-1 px-3"><i class="fa fa-calendar-alt"></i> | Since: {{date('M Y', strtotime($poet->created_at))}}</a>
                        </div>
                        <h1>{!! ucwords($poet->name) !!}</h1>
                        <p style="color: black">@if($poet->bio == null) No Data Yet! @else  {!! $poet->bio !!} @endif</p><hr>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="box-shadow p-3">
                        @if($poet->getFirstMedia())
                            <img style="border-radius: 10% ;width:100%;object-fit: contain" src="{{$poet->getFirstMediaUrl()}}" alt="{!!  strtoupper($poet->name) !!}" class="w-100">
                        @else
                            <img style="border-radius: 10% ; width:100%;object-fit: contain" src="{{url('public/noImage.jpeg')}}" alt="{!!  strtoupper($poet->name) !!}" class="w-100">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.thePoetCollection')

@endsection
