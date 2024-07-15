@extends('layouts.master')

@section('title') Words Poets @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Words Poets  @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="timeline-count p-4">
                        <!-- Timeline row Start -->
                        <div class="row">
                        @foreach($words as $word)

                            <!-- Timeline 1 -->
                            <div class="timeline-box col-lg-4">
                                @if(Auth::user()->role == "admin")
                                    @if($word->selected == 0)
                                        <a href="{{route('poetOfTheWeekWord',$word->id)}}" class="btn btn-secondary btn-sm">Make poet of the week</a><br><hr>
                                    @else
                                        <a href="#" class="btn btn-success btn-sm">selected as poet of the week</a><br><hr>
                                    @endif
                                @endif
                                @if(Auth::user()->role == "admin")
                                    @if($word->status == 0)
                                        <a href="{{route('approveWord',$word->id)}}" class="btn btn-success btn-sm">Approve</a><br>
                                    @else
                                        <a href="{{route('disApproveWord',$word->id)}}" class="btn btn-warning btn-sm">Remove From Website</a><br>
                                    @endif
                                @endif
                                    <hr>
                                    <div class="timeline-spacing">
                                        {{--<div class="item-lable bg-primary rounded" style="width: 80%">--}}
{{--                                            <h4 class="text-center text-white">{!! ucwords($word->title) !!}</h4>--}}
                                        {{--</div>--}}
                                    <div class="timeline-line active">
                                        <div class="dot bg-primary"></div>
                                    </div>
                                    <div class="vertical-line">
                                        <div class="wrapper-line bg-light"></div>
                                    </div>
                                    <div class="bg-light p-4 rounded mx-3">
                                        <h5>{!! ucwords($word->title) !!}</h5>
                                        <p class="text-muted mt-1 mb-0">{!! $word->poetry !!}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Timeline 1 -->

                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection
