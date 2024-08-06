<!doctype html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="vh-100">
    <button class="btn btn-primary d-lg-none m-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
        aria-expanded="false" aria-controls="sidebarMenu">
        <i class="bi bi-list"></i> Menú
    </button>

    <div class="d-flex flex-column flex-lg-row h-100">
        <div class="collapse bg-light border-end d-lg-block" id="sidebarMenu">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="bi bi-binoculars me-2"></i>Plomes <br> De <br> Mar
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="{{ url('/users') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="bi bi-card-list me-2"></i>Usuarios
                </a>
                <a href="{{ url('/observations') }}"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="bi bi-calendar-event me-2"></i>Facturas
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="bi bi-people me-2"></i>Planes
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="bi bi-life-preserver me-2"></i>Equipos
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="bi bi-life-preserver me-2"></i>Transacciones
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="bi bi-life-preserver me-2"></i>Creditos
                </a>
            </div>
        </div>

        <div id="page-content-wrapper" class="flex-grow-1">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    @stack('scripts')
</body>

</html>
