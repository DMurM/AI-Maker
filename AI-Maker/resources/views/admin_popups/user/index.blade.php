@extends('admin.admin_dashboard')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-5" style="color: #004F71;">Lista de Usuarios</h1>
            <button type="button" class="btn btn-primary" border: none;" data-bs-toggle="modal" data-bs-target="#create">
                <i class="bi bi-plus-circle-fill"></i> Añadir
            </button>
        </div>

        <!-- Search Input -->
        <div class="input-group mb-4">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
            <input type="text" id="filtro" class="form-control" placeholder="Buscar Usuarios..." aria-label="Buscar"
                aria-describedby="basic-addon1">
        </div>
        @include('admin_partials.user_table', ['users' => $users, 'roles' => $roles, 'plans' => $plans])
    </div>
    @include('admin_popups.user.create')
@endsection
