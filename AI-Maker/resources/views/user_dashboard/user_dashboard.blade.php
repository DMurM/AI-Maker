<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .line-div {
            width: 100%;
            border-top: 3px solid #41409f;
            box-sizing: border-box;
            height: 0;
        }

        .icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }
    </style>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/user_dashboard.blade.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 bg-dark text-white">
                <div class="d-flex flex-column h-100">
                    <div class="flex-grow-1">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="index.php" id="home-link">
                                    <img src="/images/dashpics/home-05.png" class="icon" alt="Home">Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="/images/dashpics/user-01.svg" class="icon" alt="Profile">My Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="/images/dashpics/folder.svg" class="icon" alt="Assets">Assets
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="/images/dashpics/team.svg" class="icon" alt="Team">Team
                                </a>
                            </li>
                        </ul>
                        <div class="line-div"></div>
                        <ul class="nav flex-column mt-3">
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="{{ route('image_generation.form') }}">
                                    <img src="/images/dashpics/imageneration.svg" class="icon" alt="Image Generation">Image Generation
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="/images/dashpics/imagedit.svg" class="icon" alt="Image Editing">Image Editing
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="/images/dashpics/videotools.svg" class="icon" alt="Video Tools">Video Tools
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="/images/dashpics/audiotool.svg" class="icon" alt="Audio Tools">Audio Tools
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="profile-info p-3 mt-auto bg-dark">
                        <div class="d-flex flex-column align-items-start">
                            <p class="mb-1">{{ $name }} {{ $lastname }}</p>
                            <p class="mb-2">{{ $email }}</p>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <header class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">User Dashboard</h1>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Credits: {{ $credits }}</button>
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

                <!-- Image Editing Section -->
                <div class="section mb-4">
                    <h2 class="section-title">Image Editing</h2>
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

                <!-- Video Tools Section -->
                <div class="section mb-4">
                    <h2 class="section-title">Video Tools</h2>
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

                <!-- Audio Tools Section -->
                <div class="section mb-4">
                    <h2 class="section-title">Audio Tools</h2>
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
            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
