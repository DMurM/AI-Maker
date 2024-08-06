<div class="modal fade" id="create" tabindex="-1" aria-labelledby="modalLabelNuevo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalLabelNuevo">Agregar Nuevo Usuario</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Ejemplo: Juan" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="lastname" name="lastname"
                            placeholder="Ejemplo: Pérez" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Ejemplo: juan.perez@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="plan_id" class="form-label">Plan</label>
                        <select class="form-control" id="plan_id" name="plan_id">
                            <option value="">Seleccionar un plan</option>
                            @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">URL de la Foto de Perfil</label>
                        <input type="text" class="form-control" id="profile_picture" name="profile_picture"
                            placeholder="Ejemplo: http://example.com/photo.jpg">
                    </div>
                    <div class="mb-3">
                        <label for="roles" class="form-label">Roles</label>
                        <select multiple class="form-control" id="roles" name="roles[]">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>
