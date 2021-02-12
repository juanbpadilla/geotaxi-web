@extends('layouts.app')

@section('contenido')  
  

                        
            <div class="container" style="margin-top:30px">
              <div class="row">
                <div class="col-sm-4">
                  <h2>Nosotros</h2>
                  <div class="content">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" >
                            <div class="carousel-item active">
                                <img src="/img/auto2.jpg" class="rounded mx-auto d-block" height="250px" alt="auto2">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/auto3.jpg" class="rounded mx-auto d-block" height="250px" alt="auto3">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/auto4.jpg" class="rounded mx-auto d-block" height="250px" alt="auto4">
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
                  <p>Somos la empresa número uno en la ciudad</p>
                  <br><br><br>
                  <h3>Contáctanos</h3>
                  <p>A traves de nuestras redes sociales.</p>
                  <ul class="nav nav-pills text-center small">
                    <li class="nav-item">
                      <a class="nav-link text-secondary" href="https://wa.me/59173368506"><img src="/img/WhatsApp-Free-PNG-Image.png" class="icon-" height="30px"><br>WhatsApp</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-secondary" href="https://www.facebook.com/jbpadillac/"><img src="/img/facebook-png-redes-sociales-11.png" class="icon-" height="30px"><br>Facebook</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-secondary" href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2Fpadilla1248%3Ffbclid%3DIwAR3hogWiN4kgNY0B9MQEw6Cb6x1DVBzokBx22E4eTp-vQWfipuIHd8yqHkU&h=AT1UKSmQKuGzM9qG9iw8myMXqAK6ePzOyrhi5gU_sgFQ19eS5eenYnD_4VXfM3yFZQrD7c-8dUR3Q-RD8OP9rehgaXU_5wMqzsFp1_acKM3iLcOUrGHBtM5771SOyI2LGKk"><img src="/img/instagram-icon.png" class="icon-" height="30px"><br>Instagram</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-secondary" href="mailto:juanbpadillac@gmail.com"><img src="/img/correo_icon.png" class="icon-" height="30px"><br>Email</a>
                    </li>
                  </ul>
                  <hr class="d-sm-none">
                </div>
                <div class="col-sm-8">
                  <h2>MI UBICACIÓN EN TIEMPO REAL</h2>

                  <div class="fakeimg">
                    <div id="map"></div>
                    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
                    <script
                          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDY0rOo5NaiHngwJ6VIjpfah7RCFffHEcs&callback=initMap&libraries=&v=weekly"
                          async
                    ></script>
                  </div>

                  <br><br>
                  <h2>RADIO MOVIL SAN PEDRO</h2>
                  <h5>Un amigo a tu servicio</h5>
                  <div class="fakeimg"><img src="/img/img1.jpg" class="rounded mx-auto d-block" height="260px" alt=""></div>
                  
                </div>
              </div>
            </div>

@endsection
