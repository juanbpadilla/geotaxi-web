@extends('layouts.app')

@section('contenido')

    <div class="content">
                {{-- <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                      <li data-target="#demo" data-slide-to="1"></li>
                      <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="la.jpg" alt="Los Angeles" width="1100" height="500">
                      </div>
                      <div class="carousel-item">
                        <img src="chicago.jpg" alt="Chicago" width="1100" height="500">
                      </div>
                      <div class="carousel-item">
                        <img src="ny.jpg" alt="New York" width="1100" height="500">
                      </div>
                    </div>
                    
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>
                  </div> --}}


        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner w-100" style="height: 500px">
                <div class="carousel-item active">
                    <img src="/img/img1.jpg" class="rounded mx-auto d-block" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/img/img2.jpg" class="rounded mx-auto d-block" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/img/img3.jpg" class="rounded mx-auto d-block" alt="">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection