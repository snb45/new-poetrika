@extends('layouts.master')

@section('title') Cards Page @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Cards Page @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> New Card </h4>
                    <hr>
                    <form action="{{route('saveCard')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="mb-4 col-lg-6">
                                <h4 class="card-title">Choose Card Image</h4>
                                <p class="card-title-desc">Only PNG,JPG,JPEG Format is Allowed.</p>
                                <input type="file" id="" name="file" >
                            </div>

                            <div class="mb-4 col-lg-6">
                                <label class="control-label">Card Category</label>
                                <p class="card-title-desc">Select Card Category</p>
                                <select name="category" class="form-control">
                                    <option>Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-md-4 pull-right">
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark btn-sm waves-effect waves-light" value="Upload Card" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @if(count($cards))
        <div class="row">
            @foreach($cards as $card)
                <?php

                    $nameCategory = \App\Models\Category::find($card->category);

                ?>
                <div class="col-lg-3 col-xl-3">
                    @if($card->getFirstMedia())
                        <img class="card-img-top img-fluid" src="{{$card->getFirstMedia()->getUrl('thumb')}}" style="height: 200px; object-fit: cover" alt="Card image cap">
                    @else
                        <img class="card-img-top img-fluid" src="{{url('public/noImage.jpeg')}}" style="height: 200px; object-fit: cover" alt="Card image cap">
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title mt-0">@if($nameCategory){{ucwords($nameCategory->name)}}@else{{ucwords("un-Known")}}@endif</h1>
                            <a href="{{route('deleteCard',$card->id)}}" onclick="return confirm('Are you sure ?')" class="btn btn-sm btn-danger waves-effect waves-light">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
