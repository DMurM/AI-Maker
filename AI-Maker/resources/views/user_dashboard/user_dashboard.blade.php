<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 bg-dark text-white">
                <div class="sidebar-header">
                    <h3 class="logo">LOGO</h3>
                </div>
                <div class="nav flex-column">
                    <div class="flex-grow-1">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="{{ route('user_dashboard') }}">
                                    <i class="fas fa-home"></i> Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="{{ route('profile') }}">
                                    <i class="fas fa-user"></i> My Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <i class="fas fa-briefcase"></i> Assets
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <i class="fas fa-users"></i> Team
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="{{ route('image_generation.form') }}">
                                    <i class="fas fa-image"></i> Image Generation
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <i class="fas fa-edit"></i> Image Editing
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <i class="fas fa-video"></i> Video Tools
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <i class="fas fa-microphone"></i> Audio Tools
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="profile-info p-3 mt-auto bg-dark">
                        <div class="d-flex flex-column align-items-start">
                            <p class="mb-1">{{ Auth::user()->full_name }}</p>
                            <p class="mb-2">{{ Auth::user()->email }}</p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                            <a href="#" class="btn btn-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <header
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">User Dashboard</h1>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Credits: {{ Auth::user()->credits }}</button>
                    </div>
                </header>

                <!-- Image Generator Section -->
                <div class="section mb-4">
                    <h2 class="section-title">Image Generator</h2>
                    <div class="container">
                        <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="col-md-3 mb-3">
                                    <div class="border border-secondary rounded" style="height: 150px;">
                                        <!-- Placeholder content -->
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="section mb-4">
                    <h2 class="section-title">Image Editing</h2>
                    <div class="container">
                        <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="col-md-3 mb-3">
                                    <div class="border border-secondary rounded" style="height: 150px;">
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="section mb-4">
                    <h2 class="section-title">Video Tools</h2>
                    <div class="container">
                        <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="col-md-3 mb-3">
                                    <div class="border border-secondary rounded" style="height: 150px;">
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="section mb-4">
                    <h2 class="section-title">Audio Tools</h2>
                    <div class="container">
                        <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="col-md-3 mb-3">
                                    <div class="border border-secondary rounded" style="height: 150px;">
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
