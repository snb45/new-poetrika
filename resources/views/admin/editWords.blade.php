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
                    <h4 class="card-title">Add Words Poets</h4>
                    <hr>
                    <form action="{{route('updateWord',$words->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-4 col-lg-12">
                                @if($words->getFirstMedia())
                                    <img src="{{$words->getFirstMedia()->getUrl('thumb')}}" style="height: 150px;width: 100%;object-fit: contain"  alt="{{ucwords($words->title)}}">
                                @else
                                    <img src="{{url('public/noImage.jpeg')}}" style="height: 150px;width: 100%;object-fit: contain"  alt="{{ucwords($words->title)}}">
                                @endif
                            </div>

                            <div class="mb-4 col-lg-12">
                                <h4 class="card-title">Choose Display Image</h4>
                                <p class="card-title-desc">Only PNG,JPG,JPEG Format is Allowed.</p>
                                <input type="file" id="" name="displayImage" >
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="control-label" class="">Title</label>
                                    <input id="title" name="title" class="form-control" placeholder="title" value="{{ ucwords($words->title) }}" />
                                </div>
                            </div>

                            <div class="mb-4 col-lg-12">
                                <label class="control-label">Poet Category</label>
                                <select name="category" class="form-control">
                                    <option>Select</option>
                                    @foreach($categories as $category)
                                        <option @if($category->id == $words->category) selected @endif value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="control-label" class="">Poetry</label>
                                    <textarea id="mytextarea" name="poetry" class="form-control" placeholder="Poetry">{{$words->poetry}}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 pull-right">
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark waves-effect waves-light btn-sm" value="update" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
