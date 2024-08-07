<link href="{{ asset('css/components/sidebar.css') }}" rel="stylesheet">

<nav id="sidebar" class="col-md-2 col-lg-2 bg-dark text-white d-flex flex-column justify-content-between">
    <div>
        <div class="sidebar-header">
            <h3 class="logo">AI-Maker</h3>
        </div>
        <ul class="nav flex-column flex-grow-1 mt-3">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('user_dashboard') }}" onclick="return navigate(event, 'user_dashboard')">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('profile') }}" onclick="return navigate(event, 'profile')">
                    <i class="fas fa-user"></i> My Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#" onclick="return showComingSoon(event)">
                    <i class="fas fa-briefcase"></i> Assets <span class="badge badge-warning">Coming Soon</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('pricing.team') }}" onclick="return navigate(event, 'pricing.team')">
                    <i class="fas fa-users"></i> Team
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('image_generation.form') }}" onclick="return navigate(event, 'image_generation.form')">
                    <i class="fas fa-image"></i> Image Generation
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#" onclick="return showComingSoon(event)">
                    <i class="fas fa-sliders"></i> Image Editing <span class="badge badge-warning">Coming Soon</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#" onclick="return showComingSoon(event)">
                    <i class="fas fa-video"></i> Video Tools <span class="badge badge-warning">Coming Soon</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#" onclick="return showComingSoon(event)">
                    <i class="fas fa-microphone"></i> Audio Tools <span class="badge badge-warning">Coming Soon</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="profile-info p-3 bg-dark">
        <div class="d-flex flex-column align-items-start">
            <p class="mb-1">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
            <p class="mb-2">{{ Auth::user()->email }}</p>
            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</nav>

<script>
function navigate(event, route) {
    if (window.location.pathname === '/' + route) {
        event.preventDefault();
    }
}

function showComingSoon(event) {
    event.preventDefault();
    alert('This feature is coming soon!');
}
</script>
