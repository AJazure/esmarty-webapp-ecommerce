<div class="card mb-5">
    <form action="{{ $marca->id ? route('marca.update', $marca) : route('marca.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if ($marca->id)
            @method('PUT')
        @endif

        <div class="card-body">

            {{-- @if ($post->id) --}}
            {{-- <div class="mb-3 row">
                <img src="{{ $producto->imagen ?? 'https://via.placeholder.com/1024'}}" alt="{{ $producto->nombre }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 100%;">
            </div> --}}
            {{-- @endif --}}



            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Descripcion </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                        id="descripcion" name="descripcion"
                        value="{{ old('descripcion', optional($marca)->descripcion) }}">
                    @error('descripcion')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Estado </label>
                <div class="col-sm-8">
                    <select class="form-control @error('activo') is-invalid @enderror" name="activo" id="activo" value="{{ old('activo', optional($marca)->activo) }}">
                        <option value="1" @if ($marca->activo) {{"selected"}} @endif>Activado</option>
                        <option value="0" @if (isset($marca->activo) and !$marca->activo) {{"selected"}} @endif>Desactivado</option>
                    </select>
                    {{-- <input type="text" class="form-control @error('activo') is-invalid @enderror" id="activo"
                        name="activo" value="{{ old('activo', optional($marca)->activo) }}">--}}
                    @error('activo')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror 
                </div>
            </div>

            {{-- <div class="mb-3 row">
                <label for="imagen" class="col-sm-4 col-form-label"> * Imagen </label>
                <div class="col-sm-8">
                    <input class="form-control @error('imagen') is-invalid @enderror" type="file" id="imagen" name="imagen" accept="image/*">
                    @error('imagen')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                    </div>
                </div>
            --}}
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $marca->id ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>
    </form>

</div>

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const image = document.getElementById('imagen');

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
