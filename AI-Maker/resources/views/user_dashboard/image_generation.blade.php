<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Image Generator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/user_dashboard.blade.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 bg-dark text-white">
            <div class="sidebar-header">
                <h3 class="logo">LOGO</h3>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white d-flex align-items-center" href="{{ route('user_dashboard') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-user"></i> My Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-briefcase"></i> Assets
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-users"></i> Team
                    </a>
                </li>
            </ul>
            <hr class="sidebar-divider">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-image"></i> Image Generation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-image"></i> Image Editing
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-video"></i> Video Tools
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-microphone"></i> Audio Tools
                    </a>
                </li>
            </ul>
            <div class="profile-info p-3 mt-auto bg-dark">
                <div class="d-flex flex-column align-items-start">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
        <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <header class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">AI Image Generator</h1>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Credits: 0</button>
                </div>
            </header>
            <div class="section mb-4">
                <h2 class="section-title">Generate Images with AI</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="image-generation-form">
                                <div class="form-group">
                                    <label for="prompt">Describe an image you want to create:</label>
                                    <textarea class="form-control" id="prompt" name="prompt" rows="4" placeholder="For example: Huge, frothy waves crashing against a small, lush green island with tall palm trees swaying, under a dramatic stormy sky."></textarea>
                                </div>
                                <div class="form-row align-items-end">
                                    <div class="form-group col-md-3">
                                        <label for="aspect-ratio">Aspect ratio</label>
                                        <div class="d-flex justify-content-between">
                                            <label class="radio-inline"><input type="radio" name="aspect-ratio" value="1:1"> 1:1</label>
                                            <label class="radio-inline"><input type="radio" name="aspect-ratio" value="3:4"> 3:4</label>
                                            <label class="radio-inline"><input type="radio" name="aspect-ratio" value="4:3"> 4:3</label>
                                            <label class="radio-inline"><input type="radio" name="aspect-ratio" value="16:9"> 16:9</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="style">Style</label>
                                        <select class="form-control" id="style" name="style">
                                            <option value="none">None</option>
                                            <!-- Add more styles as options here -->
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="outputs">Number of outputs</label>
                                        <div class="d-flex justify-content-between">
                                            <label class="radio-inline"><input type="radio" name="outputs" value="1"> 1</label>
                                            <label class="radio-inline"><input type="radio" name="outputs" value="2"> 2</label>
                                            <label class="radio-inline"><input type="radio" name="outputs" value="3"> 3</label>
                                            <label class="radio-inline"><input type="radio" name="outputs" value="4"> 4</label>
                                            <label class="radio-inline"><input type="radio" name="outputs" value="5"> 5</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button type="submit" class="btn btn-primary btn-block">Generate</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12" id="generated-image">
                            <!-- Generated image will be displayed here -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
