@extends('layouts.app')

@section('content')

    <section class="breadcrumb-main pb-0 pt-6" style="background-image: url(images/bg/bg2.jpg);">
        <div class="breadcrumb-outer">
            <div class="container">
                <div class="breadcrumb-content d-md-flex align-items-center pt-6">
                    <h2 class="mb-0">About Poetrika</h2>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Poetrika</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dot-overlay"></div>
    </section>

    <section class="about-us">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-10 col-sm-12">
                        <div class="about-content">
                            <h2>About Poetrika</h2>
                            <p class="mb-3">{!! $aboutPage->about !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
