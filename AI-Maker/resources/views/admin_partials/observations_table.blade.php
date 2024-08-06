<div id="table-container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-white" style="background-color: #005B7F;">
                        <tr>
                            <th scope="col">
                                Fecha
                                <a href="?orderBy=date&orderDirection=asc" class="text-decoration-none">
                                    <i class="bi bi-arrow-up"></i>
                                </a>
                                <a href="?orderBy=date&orderDirection=desc" class="text-decoration-none">
                                    <i class="bi bi-arrow-down"></i>
                                </a>
                            </th>
                            <th scope="col">
                                Transecto
                                <a href="?orderBy=transect&orderDirection=asc" class="text-decoration-none">
                                    <i class="bi bi-arrow-up"></i>
                                </a>
                                <a href="?orderBy=transect&orderDirection=desc" class="text-decoration-none">
                                    <i class="bi bi-arrow-down"></i>
                            </th>
                            <th scope="col">Hora</th>
                            <th scope="col">WayPoint</th>
                            <th scope="col">
                                Nº Individus
                                <a href="?orderBy=number_of_individuals&orderDirection=asc"
                                    class="text-decoration-none">
                                    <i class="bi bi-arrow-up"></i>
                                </a>
                                <a href="?orderBy=number_of_individuals&orderDirection=desc"
                                    class="text-decoration-none">
                                    <i class="bi bi-arrow-down"></i>
                            <th scope="col">Foto</th>
                            <th scope="col">Vol</th>
                            <th scope="col">Dis< 300m</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($observations as $observation)
                            <tr>
                                <td>{{ $observation->date }}</td>
                                <td>{{ $observation->transect }}</td>
                                <td>{{ $observation->time }}</td>
                                <td>{{ $observation->waypoint }}</td>
                                <td>{{ $observation->number_of_individuals }}</td>
                                <td>
                                    @if ($observation->photo)
                                        <i class="bi bi-check-lg text-success" style="font-size: 1.5rem;"></i>
                                    @else
                                        <i class="bi bi-x-lg text-danger" style="font-size: 1.5rem;"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($observation->in_flight)
                                        <i class="bi bi-check-lg text-success" style="font-size: 1.5rem;"></i>
                                    @else
                                        <i class="bi bi-x-lg text-danger" style="font-size: 1.5rem;"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($observation->distance_under_300m)
                                        <i class="bi bi-check-lg text-success" style="font-size: 1.5rem;"></i>
                                    @else
                                        <i class="bi bi-x-lg text-danger" style="font-size: 1.5rem;"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $observation->id }}" title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#info{{ $observation->id }}" title="Ver más detalles">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $observation->id }}" title="Eliminar">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('observations.show')
                            @include('observations.info')
                            @include('observations.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $observations->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $observations->previousPageUrl() }}">Anterior</a>
            </li>

            <li class="page-item {{ $observations->currentPage() == 1 ? 'active' : '' }}">
                <a class="page-link" href="{{ $observations->url(1) }}">1</a>
            </li>

            @if ($observations->currentPage() > 3)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            @for ($i = max(2, $observations->currentPage() - 1); $i <= min($observations->lastPage() - 1, $observations->currentPage() + 1); $i++)
                <li class="page-item {{ $observations->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $observations->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($observations->currentPage() < $observations->lastPage() - 2)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif

            @if ($observations->lastPage() > 1)
                <li class="page-item {{ $observations->currentPage() == $observations->lastPage() ? 'active' : '' }}">
                    <a class="page-link"
                        href="{{ $observations->url($observations->lastPage()) }}">{{ $observations->lastPage() }}</a>
                </li>
            @endif

            <li class="page-item {{ $observations->currentPage() == $observations->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $observations->nextPageUrl() }}">Siguiente</a>
            </li>
        </ul>
    </nav>
</div>

</div>
