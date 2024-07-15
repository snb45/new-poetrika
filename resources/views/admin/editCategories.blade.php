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
                    <h4 class="card-title">Edi Poet Category</h4>
                    <hr>
                    <form action="{{route('updateCategories',$categories->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="mb-4 col-lg-12">
                                <input class="form-control" type="text" name="name" value="{{ucwords($categories->name)}}" placeholder="Category Name">
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

@endsection

@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection
