<div class="card mb-5">
    <form action="{{ $producto->id ? route('producto.update', $producto) : route('producto.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if ($producto->id)
            @method('PUT')
        @endif

        <div class="card-body">

            {{-- @if ($post->id) --}}
            <div class="mb-3 row">
                <img src="{{ $producto->imagen ?? 'https://via.placeholder.com/1024' }}" alt="{{ $producto->nombre }}"
                    id="image_preview" class="img-fluid"
                    style="object-fit: cover; object-position: center; height: 420px; width: 100%;">
            </div>
            {{-- @endif --}}



            <div class="mb-3 row">
                <label for="codigo_producto" class="col-sm-4 col-form-label"> * Codigo </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('codigo_producto') is-invalid @enderror"
                        id="codigo_producto" name="codigo_producto"
                        value="{{ old('codigo_producto', optional($producto)->codigo_producto) }}">
                    @error('codigo_producto')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Nombre </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                        name="nombre" value="{{ old('nombre', optional($producto)->nombre) }}">
                    @error('nombre')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="proveedor" class="col-sm-4 col-form-label"> * Proveedor </label>
                <div class="col-sm-8">
                    
                    <select id="id_proveedor" name="id_proveedor" class="form-control">
                        @foreach ($proveedores as $proveedor)
                        @if($proveedor->activo == 1)
                            <option {{$producto->id_proveedor && $producto->id_proveedor == $proveedor->id ? 'selected': ''}} value="{{ $proveedor->id }}"> 
                                {{ $proveedor->descripcion }}
                            </option>
                        @endif    
                        @endforeach 
                    </select>
                    {{--                     @error('categoria')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror --}}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="id_categoria" class="col-sm-4 col-form-label"> * Categoria </label>
                <div class="col-sm-8">
                    <select id="id_categoria" name="id_categoria" class="form-control">
                        @foreach ($categorias as $categoria)
                        @if($categoria->activo == 1)
                            <option
                                {{ $producto->id_categoria && $producto->id_categoria == $categoria->id ? 'selected' : '' }}
                                value="{{ $categoria->id }}">
                                {{ $categoria->descripcion }}
                            </option>
                        @endif
                        @endforeach
                    </select>
                    {{--                     @error('categoria')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror --}}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="id_marca" class="col-sm-4 col-form-label"> * Marca </label>
                <div class="col-sm-8">
                    <select id="id_marca" name="id_marca" class="form-control">
                        @foreach ($marcas as $marca)
                        @if($marca->activo == 1)
                            <option {{$producto->id_marca && $producto->id_marca == $marca->id ? 'selected' : '' }}
                                value="{{ $marca->id }}">
                                {{ $marca->descripcion }}
                            </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="precio" class="col-sm-4 col-form-label"> * Precio </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio"
                        name="precio" value="{{ old('precio', optional($producto)->precio) }}">
                    @error('precio')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="descripcion" class="col-sm-4 col-form-label"> * Descripción </label>
                <div class="col-sm-8">
                    <textarea class="form-control @error('descripcio') is-invalid @enderror" id="descripcion" name="descripcion" rows="10">{{ old('descripcion', optional($producto)->descripcion) }}</textarea>
                    @error('descripcio')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stock_disponible" class="col-sm-4 col-form-label"> * Stock Disponible </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('stock_disponible') is-invalid @enderror"
                        id="stock_disponible" name="stock_disponible"
                        value="{{ old('stock_disponible', optional($producto)->stock_disponible) }}">
                    @error('stock_disponible')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stock_deseado" class="col-sm-4 col-form-label"> * Stock Deseado </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('stock_deseado') is-invalid @enderror"
                        id="stock_deseado" name="stock_deseado"
                        value="{{ old('stock_deseado', optional($producto)->stock_deseado) }}">
                    @error('stock_deseado')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stock_minimo" class="col-sm-4 col-form-label"> * Stock Minimo </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('stock_minimo') is-invalid @enderror"
                        id="stock_minimo" name="stock_minimo"
                        value="{{ old('stock_minimo', optional($producto)->stock_minimo) }}">
                    @error('stock_minimo')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="url_imagen" class="col-sm-4 col-form-label"> * Imagen </label>
                <div class="col-sm-8">
                    <input class="form-control @error('url_imagen') is-invalid @enderror" type="file" id="url_imagen"
                        name="url_imagen" accept="image/*">
                    @error('url_imagen')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="activo" class="col-sm-4 col-form-label"> * Estado </label>
                <div class="col-sm-8">
                    <select class="form-control @error('activo') is-invalid @enderror" name="activo" id="activo" value="{{ old('activo', optional($producto)->activo) }}">
                        <option value="1" @if ($producto->activo) {{"selected"}} @endif>Activado</option>
                        <option value="0" @if (isset($producto->activo) and !$producto->activo) {{"selected"}} @endif>Desactivado</option>
                    </select>
                    @error('activo')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>



        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $producto->id ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>
    </form>
</div>

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const image = document.getElementById('url_imagen');

            image.addEventListener('change', (e) => {

                const input = e.target;
                const imagePreview = document.querySelector('#image_preview');

                if (!input.files.length) return

                file = input.files[0];
                objectURL = URL.createObjectURL(file);
                imagePreview.src = objectURL;
            });
        });
    </script>
@endpush
