@extends('layouts.master')

@section('title') About Page @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') About Page @endslot
        @slot('li_1') Pages  @endslot
    @endcomponent

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    @if($about)
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modify About Page</h4>
                        <hr>
                        <form action="{{route('updateAbout',$about->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="control-label" class="">P</label>
                                        <textarea id="mytextarea" name="about" class="form-control" placeholder="about">{{$about->about}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="control-label" class="">About</label>
                                        <textarea id="mytextarea" name="about" class="form-control" placeholder="about">{{$about->about}}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4 pull-right">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-dark waves-effect waves-light btn-block" value="Save" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @else

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add About</h4>
                        <hr>
                        <form action="{{route('saveAbout')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="control-label" class="">About</label>
                                        <textarea id="mytextarea" name="about" class="form-control" placeholder="about"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4 pull-right">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-dark waves-effect waves-light btn-block" value="Save" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($about)
        <div class="col-lg-12">
            <div class="card bg-dark text-light">
                <div class="card-body">
                    <h5 class="mt-0 mb-4 text-light"><i class="mdi mdi-alert-circle-outline mr-3"></i>About Page</h5>
                    <p class="card-text">{!! $about->about !!}</p>
                </div>
            </div>
        </div>
    @endif
@endsection
