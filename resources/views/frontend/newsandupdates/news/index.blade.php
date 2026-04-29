@extends('layouts.frontend')

@section('content')

<style>
  h1{
    font-family: Helvetica;
  } 

  h4{
    font-family: Helvetica;
  }




</style>

<div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Latest News</span>
          </p>
          <h1 class="mb-4">Latest News From Site</h1>
        </div>
        <div class="row pb-3">
           @foreach($news as $value)
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="{{ url('uploads/'.$value->image_file) }}" alt="">
              <div class="card-body bg-light text-center p-4">
                <h4 class="">{{ $value->title }}</h4>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"><i class="fa fa-user text-primary"></i>{{ $value->date_posted }}</small>
                </div>
                <p>{!! $value->description !!}</p>
                <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
              </div>
            </div>
          </div>
          @endforeach
          <div class="col-md-12 mb-4">
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

<!-- <style>
    h1{
        text-align: center;
        color: #046631;
        font-family: Helvetica; 
    }

    h3
    {
        font-family: Helvetica;
    }
</style> -->

<!-- <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">News</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="position-relative mb-3">
                                @foreach($news as $value)
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
    </div> -->

@endsection