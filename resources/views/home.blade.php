@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="card" style="border:none; background-color: #f8fafc">
                        <div class="card-body">
                            <h2 class="card-title text-center">Riesgos en internet</h2>
                            <p class="card-text text-center">
                                <font size="3" color="#000000"> Bienvenido al sitio informativo sobre los malos usos de internet.
                                    En este sitio encontrarás información detallada sobre las distintas formas en que internet puede ser mal utilizado y cómo protegerse de ellas.
                                </font>
                            </p>
                            
                        </div>
                        
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/imagen/int.jpg" class="card-img-bottom" style="wheight: 400px; height: 400px">
                                </div>
                                <div class="carousel-item">
                                    <img src="/imagen/Webspofing.avif" class="card-img-bottom" style="wheight: 400px; height: 400px">
                                </div>
                                <div class="carousel-item">
                                    <img src="/imagen/phishing.png" class="card-img-bottom" style="wheight: 400px; height: 400px">
                                </div>
                                <div class="carousel-item">
                                    <img src="/imagen/fakenews.png" class="card-img-bottom" style="wheight: 400px; height: 400px">
                                </div>
                                <div class="carousel-item">
                                    <img src="/imagen/extorsion.webp" class="card-img-bottom" style="wheight: 400px; height: 400px">
                                </div>
                                <div class="carousel-item">
                                    <img src="/imagen/spam.jpg" class="card-img-bottom" style="wheight: 400px; height: 400px">
                                </div>
                                <div class="carousel-item">
                                    <img src="/imagen/ciberbullying.png" class="card-img-bottom" style="wheight: 400px; height: 400px">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            </div>

                        <!--<img src="/imagen/int.jpg" class="card-img-bottom" style="wheight: 400px; height: 400px"> -->
                            
                    </div>
                     
                </div>         
            </div>
        </div>  
    </div>
</div>
@endsection