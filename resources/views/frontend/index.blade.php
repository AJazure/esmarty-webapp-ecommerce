@extends('frontend.layouts.master')
@section('title', 'Esmarty || Inicio')
@section('main-content')


    {{-- Slider --}}

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    
        <div class="carousel-inner">
          <div class="carousel-item active c-item">
            <img src="https://www.mexx.com.ar/uploads/13-11-2023-09-11-26-Banner%201.jpg" class="d-block w-100 c-img" alt="Slide 1">
          </div>
          <div class="carousel-item c-item">
            <img src="https://www.mexx.com.ar/uploads/15-11-2023-10-11-06-nvidia%20nuevo%20bund.jpg" class="d-block w-100 c-img" alt="Slide 2">
          </div>
          <div class="carousel-item c-item">
            <img src="https://www.mexx.com.ar/uploads/13-11-2023-09-11-22-ffnn.jpg" class="d-block w-100 c-img" alt="Slide 3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


    {{-- Slider Fin --}}

    <section class="categorias mt-5 mb-5">
        <div class="container">
            <div class="row mb-3">

                <div class="col-md justify-content-center">
                    <div class="text-center">
                        <h1 class="pb-4"> Categorías Principales </h1>
                    </div>
                    <div class="row p-4 content-box content-box mx-auto" style="width: 60rem">

                        <div class="col-md-12 p-2" style="height: 19rem">
                            <div class="container bg-cover img-fluid rounded-4 zoom-effect" style="height: 100%; background-image:url('https://media.istockphoto.com/id/1314343964/es/foto/unidad-de-sistema-de-gama-alta-para-el-primer-plano-de-la-computadora-de-juego.jpg?s=1024x1024&w=is&k=20&c=ASsjLSJzfd2hyzwQlvR3McJTeGduju4pMxqWZXPiCc8=')"></div>
                        </div>
                        <div class="col-md-6 col-sm-6 p-2" style="height: 23 rem">
                            <div class="container bg-cover img-fluid rounded-4 zoom-effect" style="height: 100%; background-image:url('https://media.istockphoto.com/id/1314343964/es/foto/unidad-de-sistema-de-gama-alta-para-el-primer-plano-de-la-computadora-de-juego.jpg?s=1024x1024&w=is&k=20&c=ASsjLSJzfd2hyzwQlvR3McJTeGduju4pMxqWZXPiCc8=')"></div>
                        </div>
                        <div class="col-md-6 col-sm-6 p-2" style="height: 23rem">
                            <div class="container bg-cover img-fluid rounded-4 zoom-effect" style="height: 100%; background-image:url('https://media.istockphoto.com/id/1314343964/es/foto/unidad-de-sistema-de-gama-alta-para-el-primer-plano-de-la-computadora-de-juego.jpg?s=1024x1024&w=is&k=20&c=ASsjLSJzfd2hyzwQlvR3McJTeGduju4pMxqWZXPiCc8=')"></div>
                        </div>
                        <div class="col-md-12 p-2" style="height: 19rem">
                            <div class="container bg-cover img-fluid rounded-4 zoom-effect" style="height: 100%; background-image:url('https://media.istockphoto.com/id/1314343964/es/foto/unidad-de-sistema-de-gama-alta-para-el-primer-plano-de-la-computadora-de-juego.jpg?s=1024x1024&w=is&k=20&c=ASsjLSJzfd2hyzwQlvR3McJTeGduju4pMxqWZXPiCc8=')"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Todas las Categorías --}}
    <section class="todas-categorias">
        <div class="text-center">
            <h1 class="pb-4"> Categorías Principales </h1>
        </div>
        <div class="container content-box p-4">
            <div class="row justify-content-around pb-4">

                <div class="col-md-12 rounded-4 element-box add-shadow" style="height: 250px; width: 300px;">
                    <div class="row p-2">
                        <div class="col-md-12 justify-center">
                            <img src="https://samsungar.vtexassets.com/assets/vtex.file-manager-graphql/images/311d432e-b6fe-4a4f-80a8-612a322288af___1dba251a9fbb46961106513eb2dc58b6.png" alt="#" width="100%">
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="text-enfasis">Smartwatches</div>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 rounded-4 element-box add-shadow" style="height: 250px; width: 300px;">
                    <div class="row p-2">
                        <div class="col-md-12 justify-center">
                            <img src="https://samsungar.vtexassets.com/assets/vtex.file-manager-graphql/images/311d432e-b6fe-4a4f-80a8-612a322288af___1dba251a9fbb46961106513eb2dc58b6.png" alt="#" width="100%">
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="text-enfasis">Tvs</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 rounded-4 element-box add-shadow" style="height: 250px; width: 300px;">
                    <div class="row p-2">
                        <div class="col-md-12 justify-center">
                            <img src="https://samsungar.vtexassets.com/assets/vtex.file-manager-graphql/images/311d432e-b6fe-4a4f-80a8-612a322288af___1dba251a9fbb46961106513eb2dc58b6.png" alt="#" width="100%">
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="text-enfasis">Consolas</div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 rounded-4 element-box add-shadow" style="height: 250px; width: 300px;">
                    <div class="row p-2">
                        <div class="col-md-12 justify-center">
                            <img src="https://samsungar.vtexassets.com/assets/vtex.file-manager-graphql/images/311d432e-b6fe-4a4f-80a8-612a322288af___1dba251a9fbb46961106513eb2dc58b6.png" alt="#" width="100%">
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="text-enfasis">Smartphones</div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-around">

                <div class="col-md-12 rounded-4 element-box add-shadow" style="height: 250px; width: 300px;">
                    <div class="row p-2">
                        <div class="col-md-12 justify-center">
                            <img src="https://samsungar.vtexassets.com/assets/vtex.file-manager-graphql/images/311d432e-b6fe-4a4f-80a8-612a322288af___1dba251a9fbb46961106513eb2dc58b6.png" alt="#" width="100%">
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="text-enfasis">Componentes PC</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 rounded-4 element-box add-shadow" style="height: 250px; width: 300px;">
                    <div class="row p-2">
                        <div class="col-md-12 justify-center">
                            <img src="https://samsungar.vtexassets.com/assets/vtex.file-manager-graphql/images/311d432e-b6fe-4a4f-80a8-612a322288af___1dba251a9fbb46961106513eb2dc58b6.png" alt="#" width="100%">
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="text-enfasis">Periféricos</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 rounded-4 element-box add-shadow" style="height: 250px; width: 300px;">
                    <div class="row p-2">
                        <div class="col-md-12 justify-center">
                            <img src="https://samsungar.vtexassets.com/assets/vtex.file-manager-graphql/images/311d432e-b6fe-4a4f-80a8-612a322288af___1dba251a9fbb46961106513eb2dc58b6.png" alt="#" width="100%">
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="text-enfasis">Notebooks</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 rounded-4 element-box add-shadow" style="height: 250px; width: 300px;">
                    <div class="row p-2">
                        <div class="col-md-12 justify-center">
                            <img src="https://samsungar.vtexassets.com/assets/vtex.file-manager-graphql/images/311d432e-b6fe-4a4f-80a8-612a322288af___1dba251a9fbb46961106513eb2dc58b6.png" alt="#" width="100%">
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="text-enfasis">Juegos</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- Fin Todas las Categorías --}}

    {{-- Banner Categorias --}}

    {{--     <section class="small-banner section">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h1 class="pb-4"> Categorías </h1>
                    </div>
                </div>
                @if ($categorias)
                    @foreach ($categorias as $categoria)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-banner text-center">
                                @if ($categoria->activo)
                                    <img src="https://via.placeholder.com/350x200" alt="#">
                                    <div class="content">
                                        <h3><a class="dropdown-item"
                                                href="{{ route('MandarDatosCategoriaEspecifica', $categoria->id) }}">{{ $categoria->descripcion }}</a>
                                        </h3>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section> --}}
    {{-- Banner Categorias Fin --}}

    <br>
    <br>


    {{-- Ultimos Agregados --}}
    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop-section-title text-center">
                        <h1>Últimas Novedades</h1>
                    </div>
                </div>
            </div>

            <div class="row justify-content-around mt-4 mb-4">

                @foreach ($productos->where('activo', 1)->take(5) as $producto)
                @php $imagen = explode(',', $producto->url_imagen) @endphp
                <div class="col-md-2 col-sm-5 justify-content-around">
                    <div class="card element-box m-2 producto-card" style="width: 14rem;">
                        <div class="container mt-3 bg-white" style="width: 200px; height: 200px">
                            <img src="{{ $imagen[0] }}" class="card-img-top img-fluid" alt="{{ $imagen[0] }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> {{ Str::limit($producto->nombre, 25) }} </h5>
                            <p class="card-text">$ {{ $producto->precio }}</p>
                            <a href="{{ route('MandarDatosProductoEspecifico', $producto->id) }}" class="btn color-enfasis"> Comprar </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- Ultimos Agregados Fin --}}
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@endsection