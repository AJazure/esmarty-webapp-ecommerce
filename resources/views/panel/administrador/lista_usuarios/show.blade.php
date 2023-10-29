<div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="userModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel{{ $user->id }}">Detalles del Usuario: {{ $user->name }} {{ $user->apellido }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Contenido del modal --}}
                <h5><strong>Nombre:</strong> {{ $user->name }} {{ $user->apellido }}</h5>
                <h5><strong>E-mail:</strong> {{ $user->email }}</h5>
                <h5><strong>DNI:</strong> {{ $user->dni }}</h5>
                <h5><strong>Teléfono:</strong> {{ $user->telefono }}</h5>
                <h5><strong>Rol:</strong> @foreach($user->getRoleNames() as $role)
                    {{ ucfirst($role) }}
                @endforeach</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
