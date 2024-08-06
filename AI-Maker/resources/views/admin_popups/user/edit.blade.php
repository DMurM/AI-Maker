<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" aria-labelledby="editLabel{{ $user->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel{{ $user->id }}">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name{{ $user->id }}" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name{{ $user->id }}" name="name"
                            value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname{{ $user->id }}" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="lastname{{ $user->id }}" name="lastname"
                            value="{{ $user->lastname }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email{{ $user->id }}" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email{{ $user->id }}" name="email"
                            value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password{{ $user->id }}" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password{{ $user->id }}" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation{{ $user->id }}" class="form-label">Confirmar
                            Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation{{ $user->id }}"
                            name="password_confirmation">
                    </div>
                    <div class="mb-3">
                        <label for="plan_id{{ $user->id }}" class="form-label">ID del Plan</label>
                        <input type="number" class="form-control" id="plan_id{{ $user->id }}" name="plan_id"
                            value="{{ $user->plan_id }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture{{ $user->id }}" class="form-label">URL de la Foto de
                            Perfil</label>
                        <input type="text" class="form-control" id="profile_picture{{ $user->id }}"
                            name="profile_picture" value="{{ $user->profile_picture }}">
                    </div>
                    <div class="mb-3">
                        <label for="roles{{ $user->id }}" class="form-label">Roles</label>
                        <select multiple class="form-control" id="roles{{ $user->id }}" name="roles[]">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->role }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
