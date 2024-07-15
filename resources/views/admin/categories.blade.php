@extends('layouts.master')

@section('title') Poets Categories @endsection
@section('css')
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Poets Categories  @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Poet Category</h4>
                    <hr>
                    <form action="{{route('saveCategories')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="mb-4 col-lg-12">
                                <input class="form-control" type="text" name="name" placeholder="Category Name">
                            </div>

                        </div>

                        <div class="col-md-4 pull-right">
                            <div class="form-group">
                                <input type="submit" class="btn btn-dark waves-effect waves-light btn-block" value="Save Category" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category table</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{ date('d M ,Y', strtotime($category->created_at))." "." (".Carbon\Carbon::parse($category->created_at)->diffForHumans().") "  }}</td>
                                <td>
                                    <div class="btn-group col-12">
                                        <button type="button" class="btn btn-dark waves-effect waves-light btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">Actions</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-primary" href="{{route('editCategories',$category->id)}}">Edit</a>
                                            <a onclick="return confirm('Are You Sure?')" class="dropdown-item text-danger" href="{{route('deleteCategories',$category->id)}}">delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection
