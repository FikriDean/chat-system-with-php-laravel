<nav class="navbar">
				<div class="container-fluid">
								<a class="navbar-brand">
												<img src="{{ asset('photo_profiles/default_pp.png') }}" alt="{{ $user->name }}"
																style="width: 50px; height: 50px" class="rounded-circle">
								</a>
								<div class="dropdown">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
																class="bi bi-three-dots-vertical" viewBox="0 0 16 16" data-bs-toggle="dropdown"
																style="cursor: pointer;">
																<path
																				d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
												</svg>
												<ul class="dropdown-menu">
																<li><a class="dropdown-item" href="#">Action</a></li>
																<li><a class="dropdown-item" href="#">Another action</a></li>
																<li><a class="dropdown-item" href="#">Something else here</a></li>
												</ul>
								</div>
				</div>
</nav>
