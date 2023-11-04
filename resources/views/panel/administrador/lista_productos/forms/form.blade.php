<div class="card mb-5">
    <form action="{{ $producto->id ? route('producto.update', $producto) : route('producto.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if ($producto->id)
            @method('PUT')
        @endif

        <div class="card-body">

            {{-- @if ($producto->id) --}}
            {{-- <div class="mb3 row" id="imagePreviewContainer">
                <img src="{{ $producto->imagen ?? 'https://via.placeholder.com/250' }}" alt="{{ $producto->nombre }}"
                    id="image_preview" class="img-fluid"
                    style="object-fit: cover; object-position: center; height: 250px; width: 250px;">
            </div> --}}
            @if (!empty($producto->id))
            <h3>ENTRO POR EDIT</h3>
            <div class="mb-3" id="imagePreviewDefault">
                @foreach ($imagenes as $imagen)
                <img src="{{ $imagen }}" alt="{{ $producto->nombre }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 250px; width: 250px;">    
                @endforeach
            </div>    
            @endif

            <div class="mb-3 row" id="imagePreviewContainer">
                {{-- muestra imágenes con js --}}
                
            </div>
            
            {{-- @endif --}}

            <div class="mb-3 row">
                <label for="url_imagen" class="col-sm-4 col-form-label"> * Imágenes </label>
                <div class="col-sm-8">
                    <input class="form-control @error('url_imagen') is-invalid @enderror" type="file" id="url_imagen"
                        name="url_imagen[]" multiple accept="image/*">
                    @error('url_imagen')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="codigo_producto" class="col-sm-4 col-form-label"> * Código </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('codigo_producto') is-invalid @enderror"
                        id="codigo_producto" name="codigo_producto" placeholder="código correspondiente al producto"
                        value="{{ old('codigo_producto', optional($producto)->codigo_producto) }}" maxlength="15">
                    @error('codigo_producto')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Nombre </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                        name="nombre" placeholder="nombre del producto"
                        value="{{ old('nombre', optional($producto)->nombre) }}" maxlength="120">
                    @error('nombre')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            

            <div class="mb-3 row">
                <label for="proveedor" class="col-sm-4 col-form-label"> * Proveedor </label>
                <div class="col-sm-8">
                    
                    <select id="id_proveedor" name="id_proveedor" class="form-control @error('id_proveedor') is-invalid @enderror">
                        <option disabled selected>---- seleccione un proveedor ----</option>
                        @foreach ($proveedores as $proveedor)
                        @if($proveedor->activo == 1)
                            <option {{$producto->id_proveedor && $producto->id_proveedor == $proveedor->id ? 'selected': ''}} value="{{ $proveedor->id }}"> 
                                {{ $proveedor->descripcion }}
                            </option>
                        @endif    
                        @endforeach 
                    </select>
                    @error('id_proveedor')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="id_categoria" class="col-sm-4 col-form-label"> * Categoria </label>
                <div class="col-sm-8">
                    <select id="id_categoria" name="id_categoria" class="form-control @error('id_categoria') is-invalid @enderror">
                        <option disabled selected>---- seleccione una categoría ----</option>
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
                    @error('id_categoria')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="id_marca" class="col-sm-4 col-form-label"> * Marca </label>
                <div class="col-sm-8">
                    <select id="id_marca" name="id_marca" class="form-control @error('id_marca') is-invalid @enderror">
                        <option disabled selected>---- seleccione una marca ----</option>
                        @foreach ($marcas as $marca)
                        @if($marca->activo == 1)
                            <option {{$producto->id_marca && $producto->id_marca == $marca->id ? 'selected' : '' }}
                                value="{{ $marca->id }}">
                                {{ $marca->descripcion }}
                            </option>
                        @endif
                        @endforeach
                    </select>
                    @error('id_marca')
                    <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="precio" class="col-sm-4 col-form-label"> * Precio </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio" placeholder="precio del producto"
                        name="precio" value="{{ old('precio', optional($producto)->precio) }}" maxlength="9">
                    @error('precio')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="descripcion" class="col-sm-4 col-form-label"> * Descripción </label>
                <div class="col-sm-8">
                    <textarea class="form-control @error('descripcio') is-invalid @enderror" id="descripcion" name="descripcion" rows="10"
                    placeholder="agregue una descripción del producto, información técnica, características, detalles importantes para el cliente, etc...">{{ old('descripcion', optional($producto)->descripcion) }}</textarea>
                    @error('descripcio')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stock_disponible" class="col-sm-4 col-form-label"> * Stock Disponible </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('stock_disponible') is-invalid @enderror"
                        id="stock_disponible" name="stock_disponible" placeholder="cantidad de stock disponible actualmente"
                        value="{{ old('stock_disponible', optional($producto)->stock_disponible) }}" maxlength="3">
                    @error('stock_disponible')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stock_deseado" class="col-sm-4 col-form-label"> * Stock Deseado </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('stock_deseado') is-invalid @enderror"
                        id="stock_deseado" name="stock_deseado" placeholder="cantidad de stock deseado o seguro"
                        value="{{ old('stock_deseado', optional($producto)->stock_deseado) }}" maxlength="3">
                    @error('stock_deseado')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stock_minimo" class="col-sm-4 col-form-label"> * Stock Minimo </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('stock_minimo') is-invalid @enderror"
                        id="stock_minimo" name="stock_minimo" placeholder="cantidad de stock mínimo"
                        value="{{ old('stock_minimo', optional($producto)->stock_minimo) }}" maxlength="3">
                    @error('stock_minimo')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            @if ($producto->id)
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
            @endif



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

    //el siguiente evento reconoce cuando se sube una imagen o un grupo de imágenes, entonces inserta un elemento para dar una vista previa
    document.addEventListener("DOMContentLoaded", function(event) {
        const image = document.getElementById('url_imagen');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');

        image.addEventListener('change', (e) => {
            const input = e.target;
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');

            if (document.getElementById('imagePreviewDefault') !== null) {
                console.log('eliminando preview');
                document.getElementById('imagePreviewDefault').remove(); //si se carga nuevamente imágenes entonces se elimina el div que trae de la bd lo previamente cargado
            }

            // Limpiar las imágenes anteriores
            imagePreviewContainer.innerHTML = '';
            

            if (input.files.length > 0) {
                for (let i = 0; i < Math.min(input.files.length, 3); i++) {
                    const file = input.files[i];
                    const objectURL = URL.createObjectURL(file);
                    const img = document.createElement('img');
                    img.src = objectURL;
                    img.classList.add('preview-image');
                    img.src = objectURL;
                    img.classList.add('preview-image');
                    img.style.objectFit = 'cover';
                    img.style.objectPosition = 'center';
                    img.style.height = '250px';
                    img.style.width = '250px';
                    imagePreviewContainer.appendChild(img);
                }
            }
        });
    });
</script>
@endpush
