<div id="table-container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-white" style="background-color: #005B7F;">
                        <tr>
                            <th scope="col">
                                Nombre
                                <a href="?orderByField=name&orderByDirection=asc" class="text-decoration-none">
                                    <i class="bi bi-arrow-up"></i>
                                </a>
                                <a href="?orderByField=name&orderByDirection=desc" class="text-decoration-none">
                                    <i class="bi bi-arrow-down"></i>
                                </a>
                            </th>
                            <th scope="col">
                                Apellido
                                <a href="?orderByField=lastname&orderByDirection=asc" class="text-decoration-none">
                                    <i class="bi bi-arrow-up"></i>
                                </a>
                                <a href="?orderByField=lastname&orderByDirection=desc" class="text-decoration-none">
                                    <i class="bi bi-arrow-down"></i>
                                </a>
                            </th>
                            <th scope="col">
                                Email
                                <a href="?orderByField=email&orderByDirection=asc" class="text-decoration-none">
                                    <i class="bi bi-arrow-up"></i>
                                </a>
                                <a href="?orderByField=email&orderByDirection=desc" class="text-decoration-none">
                                    <i class="bi bi-arrow-down"></i>
                                </a>
                            </th>
                            <th scope="col">Roles</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles->pluck('role')->join(', ') }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $user->id }}" title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $user->id }}" title="Eliminar">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('admin_popups.user.edit', ['user' => $user, 'roles' => $roles])
                            @include('admin_popups.user.delete', ['user' => $user])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $users->previousPageUrl() }}">Anterior</a>
            </li>

            <li class="page-item {{ $users->currentPage() == 1 ? 'active' : '' }}">
                <a class="page-link" href="{{ $users->url(1) }}">1</a>
            </li>

            @if ($users->currentPage() > 3)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            @for ($i = max(2, $users->currentPage() - 1); $i <= min($users->lastPage() - 1, $users->currentPage() + 1); $i++)
                <li class="page-item {{ $users->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($users->currentPage() < $users->lastPage() - 2)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            @if ($users->lastPage() > 1)
                <li class="page-item {{ $users->currentPage() == $users->lastPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $users->url($users->lastPage()) }}">{{ $users->lastPage() }}</a>
                </li>
            @endif

            <li class="page-item {{ $users->currentPage() == $users->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $users->nextPageUrl() }}">Siguiente</a>
            </li>
        </ul>
    </nav>
</div>
