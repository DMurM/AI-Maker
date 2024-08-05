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
	
			<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
				<header>
					<x-menu_dashboard/>
				</header>
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h2">{{ Auth::user()->full_name }}</h1>
					<div class="btn-group">
						<button type="button" class="btn btn-primary">Credits: {{ Auth::user()->credit }}</button>
					</div>
				</div>
				<div class="tabs">
					<div class="tab">
						<a class="label" href="{{ route('profile') }}">My Account</a>
					</div>
					<div class="tab">
						<a class="label" href="{{ route('payment') }}">Membership & Plans</a>
					</div>
					<div class="tab">
						<a href="#" class="label">My Referrals</a>
					</div>
				</div>
				
				<div class="container mt-4">
					<div class="card p-4">
						<div class="card-body">
							<form>
							<div class="input">
    							<label for="profile-picture">Profile picture</label>
    							<div class="frame-parent">
								<div class="jd-wrapper">
									@if(Auth::user()->profile_picture)
    									<img src="{{ asset(Auth::user()->profile_picture) }}" alt="Foto de Perfil">
									@else
    									<img src="{{ asset('images/homepic.jpg') }}">
									@endif
									<form action="" method="POST" enctype="multipart/form-data">
						    			@csrf
    									<div>
        									<label for="profile_picture">Subir Foto de Perfil:</label>
        									<input type="file" name="profile_picture" id="profile_picture" accept="image/*" required>
    									</div>
    									<button type="submit">Subir</button>
									</form>
            							<img class="upload-01-icon" alt="" src="images\upload-01.svg">
        							</div>
    							</div>
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" placeholder="User"  
								value= {{ Auth::user()->user_name }}>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email"
									value={{ Auth::user()->email }}>
							</div>

								<div class="form-group">
									<label for="firstName">First Name</label>
									<input type="text" class="form-control" id="firstName" placeholder="First Name"
										value={{ Auth::user()->name }}>
								</div>

								<div class="form-group">
									<label for="lastName">Last Name</label>
									<input type="text" class="form-control" id="lastName" placeholder="Last Name"
										value={{ Auth::user()->lastname }}>
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