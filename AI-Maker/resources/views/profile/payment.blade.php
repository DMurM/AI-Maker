<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 bg-dark text-white">
                <div class="d-flex flex-column h-100">
                    <div class="flex-grow-1">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center"
                                    href="{{ route('user_dashboard') }}" id="home-link">
                                    <img src="\images\home-05.png" class="icon" alt="">Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="{{ route('profile') }}">
                                    <img src="{{ asset('images/user-01.svg') }}" class="icon" alt="">My Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="\Images\folder.svg" class="icon" alt="">Assets
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="\Images\team.svg" class="icon" alt="">Team
                                </a>
                            </li>
                        </ul>
                        <div class="line-div"></div>
                        <ul class="nav flex-column mt-3">
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="/Images/imageneration.svg" class="icon" alt="">Image Generation
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="\Images\imagedit.svg" class="icon" alt="">Image Editing
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="\Images\videotools.svg" class="icon" alt="">Video Tools
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="#">
                                    <img src="\Images\audiotool.svg" class="icon" alt="">Audio Tools
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="profile-info p-3 mt-auto bg-dark">
                        <div class="d-flex flex-column align-items-start">
                            <p class="mb-1">{{ Auth::user()->full_name }}</p>
                            <p class="mb-2">{{ Auth::user()->email }}</p>
                            <a href="{{ route('logout') }}" class="btn btn-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <header
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ Auth::user()->full_name }}</h1>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Credits: {{ Auth::user()->credit }}</button>
                    </div>
                </header>
                <div class="tabs">
                    <div class="tab">
                        <a class="label" href="{{ route('profile') }}">My Account</a>
                    </div>
                    <div class="tab">
                        <a href="#" class="label">Membership & Plans</a>
                    </div>
                    <div class="tab">
                        <a href="#" class="label">My Referrals</a>
                    </div>
                </div>
                <div class="coins">
                    <div class="input">
                        <div class="current-coins">Current coins</div>
                    </div>
                    <div class="coins-parent">
                        <div class="coins1">
                            <div class="buttons">
                                <img class="coins-03-icon" alt="" src="coins-03.svg">
                                <div class="text">10</div>
                            </div>
                            <div class="monthly-coins">Monthly Coins</div>
                        </div>
                        <div class="coins2">
                            <div class="current-coins">+</div>
                        </div>
                        <div class="coins1">
                            <div class="buttons">
                                <img class="coins-03-icon" alt="" src="coins-03.svg">
                                <div class="text">0</div>
                            </div>
                            <div class="monthly-coins">Lifetime Coins</div>
                        </div>
                    </div>
                </div>
                <div class="line-div"></div>

            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>