<link rel="stylesheet" href="{{ asset('css/detalleProducto.css') }}">

@php
$imagen = explode('|', $producto->url_imagen);

@endphp
<div class = "card-wrapper">
    <div class = "card">
      <!-- Card Izquierda -->
      <div class = "product-imgs">
        <div class = "img-display">
          <div class = "img-showcase">
            <img class="imagen" src = "{{ $imagen[0] }}" alt = "imagen-producto">
            <img class="imagen" src = "{{ isset($imagen[1]) ? $imagen[1] : '' }}" alt = "imagen-producto">
            <img class="imagen" src = "{{ isset($imagen[2]) ? $imagen[2] : '' }}" alt = "imagen-producto">
          </div>
        </div>
        <div class = "img-select">
          <div class = "img-item">
            <a href = "#" data-id = "1">
              <img src = "{{ $imagen[0] }}" alt = "imagen-producto">
            </a>
          </div>
          <div class = "img-item">
            <a href = "#" data-id = "2">
              <img src = "{{ isset($imagen[1]) ? $imagen[1] : '' }}" alt = "imagen-producto">
            </a>
          </div>
          <div class = "img-item">
            <a href = "#" data-id = "3">
              <img src = "{{ isset($imagen[2]) ? $imagen[2] : '' }}" alt = "imagen-producto">
            </a>
          </div>
        </div>
      </div>
      {{-- End Card Izquierda --}}
      <!-- Card Derecha-->
      <div class = "product-content">
        <h2 class = "text-title product-title"> {{ $producto->nombre }} </h2>
        <a href = "{{ route('MandarDatosCategoriaEspecifica', ['categoria' => $categoriaEspecifica->id]) }}"
            class = "product-link"> {{ $categoriaEspecifica->descripcion }} </a>
  
        <div class = "product-price">
          <p class = "new-price">Precio: <span>$ {{ $producto->precio }} </span></p>
        </div>
  
        <div class = "product-detail">
          <h2>Descripción:</h2>
          <p>{{ $producto->descripcion }}</p>
        </div>
        <!-- End card derecha -->
        
        <div class="product-buy">
            <div>
                <button href="#" data-agregar-id="{{ $producto->id }}"
                    class="btn btn-sm color-enfasis text-white text-uppercase me-1 mr-2 agregarAlCarrito">
                    Agregar al carrito
                </button>
            </div>
        </div>
        <!-- -->
  
      </div>
    </div>
  </div>