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
                    <form action="{{route('saveSocial')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <p style="color: red">Only: Facebook,Twitter,Instagram,and LinkidIn</p>
                            <div class="mb-4 col-md-12">
                                <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Social Media Name">
                            </div>

                            <div class="mb-4 col-md-12">
                                <input class="form-control" type="text" name="link" value="{{old('link')}}" placeholder="Social Media Link">
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

                    <h4 class="card-title">Poetrika Account List</h4>
                    <hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($socials as $user)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{ucwords($user->name)}}</td>
                                <td><a href="{{$user->link}}" target="_blank" class="btn btn-primary btn-block">{{ucwords($user->name)}}</a></td>
                                <td><a href="{{route('deleteSocial',$user->id)}}" onclick="return confirm('are you sure?')" class="btn btn-danger btn-block">Delete</a></td>
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

@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection
