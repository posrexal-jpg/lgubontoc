@extends('layouts.frontend')

@section('content')

<style>
    h1{
        text-align: center;
        color: #046631;
        font-family: Helvetica; 
    }

    h3
    {
        font-family: Helvetica;
    }
</style>

<div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Upcoming Updates</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="position-relative mb-3">
                                @foreach($upcomingupdates as $value)
                                <img class="img-fluid w-100" src="{{ url('uploads/'.$value->image_file) }}" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="#">{{ $value->title }}</a>
                                        <span class="px-1">/</span>
                                        <span>{{ $value->date_posted }}</span>
                                    </div>
                                    <a class="h6" href="">{!! $value->description !!}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection