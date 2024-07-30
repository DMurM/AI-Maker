<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
								<a class="nav-link text-white d-flex align-items-center" href="index.php"
									id="home-link">
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
							<p class="mb-1">{{ Auth::user()->name }}</p>
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
						<a href="#" class="label">My Account</a>
					</div>
					<div class="tab">
						<a href="#" class="label">Membership & Plans</a>
					</div>
					<div class="tab">
						<a href="#" class="label">My Referrals</a>
					</div>
					<div class="tab">
						<a href="#" class="label">Billing</a>
					</div>
				</div>
				<div class="container mt-4">
					<div class="card p-4">
						<div class="card-body">
							<form>
								<div class="form-group">
									<label for="profilePicture">Profile picture</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="profilePictureLabel">ID</span>
										</div>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="profilePicture"
												aria-describedby="profilePictureLabel">
											<label class="custom-file-label" for="profilePicture">Upload file</label>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" placeholder="Username">
								</div>

								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email"
										value="jane@email.com">
								</div>

								<div class="form-group">
									<label for="firstName">First Name</label>
									<input type="text" class="form-control" id="firstName" placeholder="First Name"
										value="Jane">
								</div>

								<div class="form-group">
									<label for="lastName">Last Name</label>
									<input type="text" class="form-control" id="lastName" placeholder="Last Name"
										value="Doe">
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<button type="button" class="btn btn-secondary btn-block" id="changePassword">Change
										password</button>
								</div>

								<div class="form-group">
									<button type="button" class="btn btn-danger btn-block" id="deleteAccount">Delete
										Account</button>
								</div>
							</form>
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