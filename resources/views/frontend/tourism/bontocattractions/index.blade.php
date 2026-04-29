@extends('layouts.frontend')

@section('content')

<style>

h3{
  color: white;
}

h4{
  color: #046631;
  text-align: center;
  font-family: Helvetica;
}

</style>

<div class="container-fluid"><br>

<h4>POPULAR DESTINATIONS</h4><br>

    <div class="row" style="padding:0px;">
        <div class="col-lg-12">
                <div id="slides" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                    <li data-target="#slides" data-slide-to="0" class="active"></li>
                    <li data-target="#slides" data-slide-to="1" class=""></li>
                    <li data-target="#slides" data-slide-to="2" class=""></li>
                    <li data-target="#slides" data-slide-to="3" class=""></li>
                    <li data-target="#slides" data-slide-to="4" class=""></li>
                    <li data-target="#slides" data-slide-to="5" class=""></li>
                     <li data-target="#slides" data-slide-to="6" class=""></li>
                     <li data-target="#slides" data-slide-to="8" class=""></li>
                     <li data-target="#slides" data-slide-to="9" class=""></li>
                     <li data-target="#slides" data-slide-to="10" class=""></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('resources/img/LGUBontocTourismPage/357726720_255738203858362_6916040560477426120_n.jpg')}}" class="img-fluid" style="width: 100%; height: 100%;">
                            <div class="carousel-caption">
                              <h3>Bontoc Boulevard</h3>
                              <p>We'd love to serve you!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('resources/img/LGUBontocTourismPage/357758985_255738227191693_7770152592398406372_n.jpg')}}" class="img-fluid" style="width: 100%; height: 100%;">
                            <div class="carousel-caption">
                              <h3>Floating Cottage</h3>
                              <p>We'd love to serve you!</p>
                            </div> 
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('resources/img/LGUBontocTourismPage/358088530_255737810525068_4706605546751720629_n.jpg')}}" class="img-fluid" style="width: 100%; height: 100%;">
                            <div class="carousel-caption">
                              <h3>Floating Cottage</h3>
                              <p>Thank you for visiting Kapalong!</p>
                            </div>  
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('resources/img/LGUBontocTourismPage/357715021_255741877191328_557352104818833066_n.jpg')}}" class="img-fluid" style="width: 100%; height: 100%;">
                            <div class="carousel-caption">
                              <h3>Santo Nino Parish Church</h3>
                              <!-- <p>We'd love to see you again!</p> -->
                            </div> 
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('resources/img/LGUBontocTourismPage/357721356_255738340525015_724184738969647289_n.jpg')}}" class="img-fluid" style="width: 100%; height: 100%;">
                            <div class="carousel-caption">
                              <h3>Kawayan Festival</h3>
                              <!-- <p>Thank you for visiting Kapalong!</p> -->
                            </div> 
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('resources/img/LGUBontocTourismPage/358098180_255737537191762_511096645561435252_n.jpg')}}" class="img-fluid" style="width: 100%; height: 100%;">
                            <div class="carousel-caption">
                              <h3>Catmon Cave</h3>
                              <p>We'd love to see you again!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('resources/img/LGUBontocTourismPage/358098598_255737790525070_3866223464367922328_n.jpg')}}" class="img-fluid" style="width: 100%; height: 100%;">
                            <div class="carousel-caption">
                              <h3>Sunset View at Bontoc Port</h3>
                              <p>We'd love to see you again!</p>
                            </div> 
                        </div>
                         <div class="carousel-item">
                            <img src="{{asset('resources/img/LGUBontocTourismPage/357558305_255741803858002_2033430698253589036_n.jpg')}}" class="img-fluid" style="width: 100%; height: 100%;">
                            <div class="carousel-caption">
                              <h3>Tag-Abaka Falls</h3>
                              <p>Pamigsian, Bontoc, So. Leyte</p>
                            </div> 
                        </div>
                         <div class="carousel-item">
                            <img src="{{asset('resources/img/LGUBontocTourismPage/292065104_125257293537656_1015438326623572769_n.jpg')}}" class="img-fluid" style="width: 100%; height: 100%;">
                            <div class="carousel-caption">
                              <h3>Elysian Floating Cottage</h3>
                              <p>Bontoc Boulevard</p>
                            </div> 
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('resources/img/LGUBontocTourismPage/378390320_295662333199282_8291648439619282409_n.jpg')}}" class="img-fluid" style="width: 100%; height: 100%;">
                            <div class="carousel-caption">
                              <h3>Day View at Bontoc Boulevard</h3>
                              <p>We'd love to see you again!</p>
                            </div> 
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#slides" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#slides" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div><br> 
        </div>
    </div>
</div>
@endsection