<div class="card mb-5">
    <form action="{{ $user->id ? route('user.update', $user) : route('user.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if ($user->id)
            @method('PUT')
        @endif

        <div class="card-body">
            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label"> * Nombre </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', optional($user)->name) }}">
                    @error('name')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="apellido" class="col-sm-4 col-form-label"> * Apellido </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido"
                        name="apellido" value="{{ old('apellido', optional($user)->apellido) }}">
                    @error('apellido')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-4 col-form-label"> * E-mail </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', optional($user)->email) }}">
                    @error('email')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="telefono" class="col-sm-4 col-form-label"> * Teléfono </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono"
                        name="telefono" value="{{ old('telefono', optional($user)->telefono) }}">
                    @error('telefono')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="password" class="col-sm-4 col-form-label"> * Contraseña </label>
                <div class="col-sm-8">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" value="">
                    @error('password')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="rol" class="col-sm-4 col-form-label"> * Rol </label>
                <div class="col-sm-8">
                    <select id="rol_id" name="rol_id" class="form-control">
                        @foreach ($all_roles as $rol)
                            <option {{ $user_role->contains($rol) ? 'selected': '' }} value="{{ $rol }}"> 
                                {{ $rol }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div> {{-- cierre div card-body --}}

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $user->id ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>
    </form>

