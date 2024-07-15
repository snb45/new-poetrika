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
                    <form action="{{route('saveWord')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-4 col-lg-12">
                                <h4 class="card-title">Choose Display Image</h4>
                                <p class="card-title-desc">Only PNG,JPG,JPEG Format is Allowed.</p>
                                <input type="file" id="" name="displayImage" >
                            </div>

                            <div class="col-md-6">
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
                                        <option value="{{$category->id}}">{{strtoupper($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="control-label" class="">Poetry</label>
                                    <textarea id="mytextarea" name="poetry" class="form-control" placeholder="Poetry"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 pull-right">
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark btn-sm waves-effect waves-light" value="Post" />
                            </div>
                        </div>
                    </form>
                </div>
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
                            <th>Poet</th>
                            <th>Uploaded At</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($words as $counter => $word)
                            <tr>
                                <td>{{$counter += 1}}</td>
                                <td>
                                    @if($word->getFirstMedia())
                                        <img src="{{$word->getFirstMedia()->getUrl('thumb')}}" style="height: 50px;width: 50px;object-fit: cover" class="rounded-circle header-profile-user" alt="{{ucwords($word->title)}}">
                                    @else
                                        <img src="{{url('public/noImage.jpeg')}}" style="height: 50px;width: 50px;object-fit: cover" class="rounded-circle header-profile-user" alt="{{ucwords($word->title)}}">
                                    @endif
                                    | {{ucwords($word->title)}}
                                </td>
                                <td>{{ucwords($word->categoryName)}}</td>
                                <td>{!! \Illuminate\Support\Str::limit($word->poetry,100) !!}</td>
                                <td>{{ucwords($word->created_at)}}</td>
                                <td>
                                    <h5>
                                        @if(Auth::user()->role == "admin")
                                            @if($word->selected == 0)
                                                <a href="{{route('poetOfTheWeekWord',$word->id)}}"><i class="fa fa-calendar" title="{{ucwords('Make poet of the week')}}"></i></a>
                                                <a href="{{route('editWords',$word->id)}}"><i class="fa fa-edit" title="{{ucwords('Edit')}}"></i></a>
                                                <a href="{{route('deleteWord',$word->id)}}" onclick="return confirm('Are You sure?')"><i class="fa fa-trash text-danger" title="{{ucwords('Delete')}}"></i></a>
                                            @else
                                                <i class="fa fa-calendar text-success" title="{{ucwords('selected poet of the week')}}"></i>
                                                <a href="{{route('editWords',$word->id)}}"><i class="fa fa-edit" title="{{ucwords('Edit')}}"></i></a>
                                                <a href="{{route('deleteWord',$word->id)}}" onclick="return confirm('Are You sure?')"><i class="fa fa-trash text-danger" title="{{ucwords('Delete')}}"></i></a>
                                            @endif
                                        @endif
                                        @if(Auth::user()->role == "admin")
                                            @if($word->status == 0)
                                                <a href="{{route('approveWord',$word->id)}}" title="Approve"><i class="fa fa-check text-success"></i></a>
                                            @else
                                                <a href="{{route('disApproveWord',$word->id)}}" title="Remove From Website"><i class="fa fa-ban text-danger"></i></a>
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
