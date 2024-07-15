@extends('layouts.master')

@section('title') Books Page @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Manage Books @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Add New Book </h4>
                    <hr>
                    <form action="{{route('saveBook')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="mb-4 col-lg-6">
                                <h4 class="card-title">Choose Cover Image</h4>
                                <p class="card-title-desc">Only PNG,JPG,JPEG Format is Allowed.</p>
                                <input type="file" required value="{{old('coverImage')}}" name="coverImage" >
                            </div>

                            <div class="mb-4 col-lg-6">
                                <h4 class="card-title">Upload The Book</h4>
                                <p class="card-title-desc">Only PDF Format is Allowed.</p>
                                <input type="file" required name="book" value="{{old('book')}}" >
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="control-label" class="">Book Title /Book Name</label>
                                    <input type="text" required class="form-control" value="{{old('title')}}" name="title" placeholder="Book Title /Book Name" >
                                </div>
                            </div>

                            <div class="mb-4 col-lg-6">
                                <label class="control-label">Book Category</label>
                                <select name="category" required class="form-control">
                                    <option>Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="control-label" class="">Book Description</label>
                                    <textarea id="mytextarea" name="description" class="form-control" placeholder="description">{{old('description')}}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 pull-right">
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark waves-effect waves-light btn-block" value="Save Book" />
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

                    <h4 class="card-title">Books List</h4>
                    <hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Book Title</th>
                            <th>Category</th>
                            <th style="width: 40%">Description</th>
                            <th>Uploaded At</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($books as $counter => $book)
                            <tr>
                                <td>{{$counter += 1}}</td>
                                <td>
                                    @if($book->getFirstMedia())
                                        <img src="{{$book->getFirstMedia()->getUrl('thumb')}}" style="height: 50px;width: 50px;object-fit: cover" class="rounded-circle header-profile-user" alt="{{ucwords($book->title)}}">
                                    @else
                                        <img src="{{url('public/noImage.jpeg')}}" style="height: 50px;width: 50px;object-fit: cover" class="rounded-circle header-profile-user" alt="{{ucwords($book->title)}}">
                                    @endif
                                    | {{ucwords($book->bookName)}}
                                </td>
                                <td>{{ucwords($book->categoryName)}}</td>
                                <td>{!! \Illuminate\Support\Str::limit($book->description,120) !!}</td>
                                <td>{{ucwords($book->created_at)}}</td>
                                <td>
                                    <h5>
                                        @if(Auth::user()->role == "admin")
                                            <a href="{{asset('/books/'.$book->link)}}" class="btn btn-secondary btn-sm waves-effect waves-light">Download</a>
                                            @if($book->status == 0)
                                                <a href="{{route('approveBook',$book->id)}}" class="btn btn-success btn-sm waves-effect waves-light">Approve</a>
                                            @else
                                                <a href="{{route('disApproveBook',$book->id)}}" class="btn btn-warning btn-sm waves-effect waves-light">Disapprove</a>
                                            @endif
                                        @endif
                                        <a target="_blank" href="{{route('deleteBook',$book->id)}}" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
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
