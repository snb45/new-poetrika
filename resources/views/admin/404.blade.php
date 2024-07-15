@extends('layouts.master')

@section('title') 404 Page @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') 404 Page  @endslot
         @slot('li_1') Pages  @endslot
     @endcomponent

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card overflow-hidden">

                        <div class="card-body">

                            <div class="text-center p-3">

                                <div class="img">
                                    <img src="{{asset('home/images/logo.jpg')}}" class="img-fluid" alt="">
                                </div>

                                <h1 class="error-page mt-5"><span>404!</span></h1>
                                <h4 class="mb-4 mt-5">Sorry, page not found</h4>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
