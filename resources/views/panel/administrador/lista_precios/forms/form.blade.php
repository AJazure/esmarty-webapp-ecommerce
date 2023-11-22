<div class="container mt-5">
    <div class="row">

        <!-- Proveedor Card -->
        <div class="col-4">
            <div class="card mb-4">
                <form action="{{ $producto->id ? route('precio.actualizarProveedor', $producto) : route('precio.actualizarProveedor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($producto->id)
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="proveedor" class="col-sm-4 col-form-label"> * Proveedor </label>
                            <div class="col-sm-8">
                                <select id="id_proveedor" name="id_proveedor" class="form-control @error('id_proveedor') is-invalid @enderror">
                                    <option disabled selected>Seleccione un Proveedor</option>
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
                            <label for="precio" class="col-sm-4 col-form-label"> * Precio </label>
                            <div class="col-sm-8">
                                <input type="range" id="precioProveedor" name="precioProveedor" min="1" max="100" />
                                <span id="porcentajeValorProveedor">50 %</span>
                                @error('precio')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success text-uppercase guardar-btn" data-target="id_proveedor">
                            {{ $producto->id ? 'Actualizar' : 'Guardar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Categoria Card -->
        <div class="col-4">
            <div class="card mb-4">
                <form action="{{ $producto->id ? route('precio.actualizarCategoria', $producto) : route('precio.actualizarCategoria') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($producto->id)
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="id_categoria" class="col-sm-4 col-form-label"> * Categoria </label>
                            <div class="col-sm-8">
                                <select id="id_categoria" name="id_categoria" class="form-control @error('id_categoria') is-invalid @enderror">
                                    <option disabled selected>Seleccione una Categoría</option>
                                    @foreach ($categorias as $categoria)
                                        @if($categoria->activo == 1)
                                            <option {{ $producto->id_categoria && $producto->id_categoria == $categoria->id ? 'selected' : '' }} value="{{ $categoria->id }}">
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
                            <label for="precio" class="col-sm-4 col-form-label"> * Precio </label>
                            <div class="col-sm-8">
                                <input type="range" id="precioCategoria" name="precioCategoria" min="1" max="100" />
                                <span id="porcentajeValorCategoria">50 %</span>
                                @error('precio')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                    <button type="submit" class="btn btn-success text-uppercase guardar-btn" data-target="id_categoria">
                            {{ $producto->id ? 'Actualizar' : 'Guardar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Marca Card -->
        <div class="col-4">
            <div class="card mb-4">
                <form action="{{ $producto->id ? route('precio.actualizarMarca', $producto) : route('precio.actualizarMarca') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($producto->id)
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="id_marca" class="col-sm-4 col-form-label"> * Marca </label>
                            <div class="col-sm-8">
                                <select id="id_marca" name="id_marca" class="form-control @error('id_marca') is-invalid @enderror">
                                    <option disabled selected>Seleccione una Marca</option>
                                    @foreach ($marcas as $marca)
                                        @if($marca->activo == 1)
                                            <option {{$producto->id_marca && $producto->id_marca == $marca->id ? 'selected' : '' }} value="{{ $marca->id }}">
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
                                <input type="range" id="precioMarca" name="precioMarca" min="1" max="100" />
                                <span id="porcentajeValorMarca">50 %</span>
                                @error('precio')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                    <button type="submit" class="btn btn-success text-uppercase guardar-btn" data-target="id_marca">
                            {{ $producto->id ? 'Actualizar' : 'Guardar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var rangeProveedor = document.getElementById("precioProveedor");
        var porcentajeValorProveedor = document.getElementById("porcentajeValorProveedor");

        rangeProveedor.addEventListener("input", function () {
            var porcentaje = rangeProveedor.value;
            porcentajeValorProveedor.textContent = porcentaje + " %";
        });

        var rangeCategoria = document.getElementById("precioCategoria");
        var porcentajeValorCategoria = document.getElementById("porcentajeValorCategoria");

        rangeCategoria.addEventListener("input", function () {
            var porcentaje = rangeCategoria.value;
            porcentajeValorCategoria.textContent = porcentaje + " %";
        });

        var rangeMarca = document.getElementById("precioMarca");
        var porcentajeValorMarca = document.getElementById("porcentajeValorMarca");

        rangeMarca.addEventListener("input", function () {
            var porcentaje = rangeMarca.value;
            porcentajeValorMarca.textContent = porcentaje + " %";
        });
    });
</script>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.guardar-btn').click(function() {
            // Obtiene el data-target del botón presionado
            var campoId = $(this).data('target');
            
            // Llama a la función de validación para el campo específico
            if (!validarCampo(campoId, 'Por favor, seleccione un ' + campoId + ' antes de guardar.')) {
                // Detiene el evento si la validación falla
                return false;
            }
        });

        // Función de validación genérica
        function validarCampo(campoId, mensajeError) {
            var valorCampo = $('#' + campoId).val();

            // Valida si el campo está vacío
            if (valorCampo === null || valorCampo === undefined || valorCampo === "") {
                // Muestra un mensaje de error debajo del input
                $('#' + campoId).addClass('is-invalid'); // Agrega la clase is-invalid al input
                $('#' + campoId + ' + .invalid-feedback').text(mensajeError); // Muestra el mensaje de error
                return false; // Devuelve false indicando que la validación ha fallado
            }

            return true; // Devuelve true indicando que la validación ha pasado
        }
    });
</script>

@endpush
