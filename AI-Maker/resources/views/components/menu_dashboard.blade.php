<nav id="sidebar" class="col-md-3 col-lg-2 bg-dark text-white">
				<div class="d-flex flex-column h-100">
					<div class="flex-grow-1">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link text-white d-flex align-items-center" href="{{ route('user_dashboard') }}"
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