@extends('layouts.master')

@section('title') Audio Poets @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Audio Poets  @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Audio</h4>
                <hr>
                <form action="{{route('saveAudio')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-4 col-lg-6">
                            <h4 class="card-title">Choose Display Image</h4>
                            <p class="card-title-desc">Only PNG,JPG,JPEG Format is Allowed.</p>
                            <input type="file" class="form-control" name="displayImage" >
                        </div>

                        <div class="mb-4 col-lg-6">
                            <h4 class="card-title">Choose Audio</h4>
                            <p class="card-title-desc">Only MP3/mpga Format is Allowed.</p>
                            <input type="file" name="audioFile">
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="control-label" class="">Title</label>
                                <input id="title" name="title" class="form-control" placeholder="title" />
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Poetrika Account List</h4>
                    <hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th style="width: 30%">Audio</th>
                            <th>Audio Details</th>
                            <th>Uploaded At</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($audios as $counter => $audio)
                            <tr>
                                <td>{{$counter += 1}}</td>
                                <td>
                                    @if($audio->getFirstMedia())
                                        <img src="{{$audio->getFirstMedia()->getUrl('thumb')}}" style="height: 50px;width: 50px;object-fit: cover" class="rounded-circle header-profile-user" alt="{{ucwords($audio->title)}}">
                                    @else
                                        <img src="{{url('public/noImage.jpeg')}}" style="height: 50px;width: 50px;object-fit: cover" class="rounded-circle header-profile-user" alt="{{ucwords($audio->title)}}">
                                    @endif
                                    | {{ucwords($audio->title)}}
                                </td>
                                <td>{{ucwords($audio->categoryName)}}</td>
                                <td style="width: 30%">
                                    <audio controls controlsList="nodownload" style="width: 100%">
                                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/mpga">
                                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/mp3">
                                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/ogg">
                                        <source src="{{asset('public/audios/'.$audio->audioFile)}}" type="audio/mpeg">
                                        Your browser does not support the audio tag.
                                    </audio>
                                </td>
                                <td>{!! \Illuminate\Support\Str::limit($audio->poetry,120) !!}</td>
                                <td>{{ucwords($audio->created_at)}}</td>
                                <td>
                                    <h5>
                                        @if(Auth::user()->role == "admin")
                                            @if($audio->selected == 0)
{{--                                                <a href="{{route('poetOfTheWeekAudio',$audio->id)}}"><i class="fa fa-calendar" title="{{ucwords('Make poet of the week')}}"></i></a>--}}
                                                <a href="{{route('editAudio',$audio->id)}}"><i class="fa fa-edit" title="{{ucwords('Edit')}}"></i></a>
                                                <a href="#" onclick="return confirm('Are You sure?')"><i class="fa fa-trash text-danger" title="{{ucwords('Delete')}}"></i></a>
                                            @else
{{--                                                <i class="fa fa-calendar text-success" title="{{ucwords('selected poet of the week')}}"></i>--}}
                                                <a href="{{route('editAudio',$audio->id)}}"><i class="fa fa-edit" title="{{ucwords('Edit')}}"></i></a>
                                                <a href="#" onclick="return confirm('Are You sure?')"><i class="fa fa-trash text-danger" title="{{ucwords('Delete')}}"></i></a>
                                            @endif
                                        @endif
                                        @if(Auth::user()->role == "admin")
                                            @if($audio->status == 0)
                                                <a href="{{route('approveAudio',$audio->id)}}" title="Approve"><i class="fa fa-check text-success"></i></a>
                                            @else
                                                <a href="{{route('disApproveAudio',$audio->id)}}" title="Remove From Website"><i class="fa fa-ban text-danger"></i></a>
                                            @endif
                                        @endif
                                    </h5>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

@endsection
