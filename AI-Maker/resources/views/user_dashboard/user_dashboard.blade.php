<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <x-sidebar /> <!-- Side-bar add component -->
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <header class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 id="dashboard-title" class="header-title">User Dashboard</h1>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Credits: {{ Auth::user()->credit }}</button>
                    </div>
                </header>

                <!-- Image Generator Section -->
                <div class="section mb-4">
                    <h2 class="section-title">Image Generator</h2>
                    <div class="container-fluid px-0">
                        <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="col-md-3 mb-3 pr-2">
                                    <div class="border border-secondary rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                        <i class="fas fa-image fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Image Editing Section -->
                <div class="section mb-4">
                    <h2 class="section-title">Image Editing</h2>
                    <div class="container-fluid px-0">
                        <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="col-md-3 mb-3 pr-2">
                                    <div class="border border-secondary rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                        <i class="fas fa-edit fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Video Tools Section -->
                <div class="section mb-4">
                    <h2 class="section-title">Video Tools</h2>
                    <div class="container-fluid px-0">
                        <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="col-md-3 mb-3 pr-2">
                                    <div class="border border-secondary rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                        <i class="fas fa-video fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Audio Tools Section -->
                <div class="section mb-4">
                    <h2 class="section-title">Audio Tools</h2>
                    <div class="container-fluid px-0">
                        <div class="row">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="col-md-3 mb-3 pr-2">
                                    <div class="border border-secondary rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                        <i class="fas fa-music fa-2x text-secondary"></i>
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
