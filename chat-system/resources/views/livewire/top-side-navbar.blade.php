<div>
				<nav class="navbar d-flex flex-column bg-primary">
								<div class="d-flex justify-content-between align-items-center w-100">
												<a class="navbar-brand mx-4 d-flex" data-bs-toggle="collapse" href="#collapseExample" role="button"
																aria-expanded="false" aria-controls="collapseExample">
																<img src="{{ asset('photo_profiles/default_pp.png') }}" alt="" style="width: 50px; height: 50px"
																				class="rounded-circle">
																@isset($userTarget->name)
																				<div class="flex-column ms-2 d-flex justify-content-center">
																								<h1 class="ms-1 text-white" style="font-size: 14px">{{ $userTarget->name }}</h1>
																								<h1 class="ms-1 text-white muted" style="font-size: 10px">
																												Last Online {{ $userTarget->updated_at->diffForHumans() }}</h1>
																				</div>
																@endisset
												</a>

												<div class="d-flex flex-row mx-3">
																<div class="mx-2">
																				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#E9E8E8"
																								class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
																								<path
																												d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
																				</svg>
																</div>

																<div class="dropdown dropstart mx-2">
																				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#E9E8E8"
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

								</div>

								<div class="collapse p-4" id="collapseExample">
												<div class="card card-body">
																Some placeholder content for the collapse component. This panel is hidden by default but revealed when
																the user activates the relevant trigger.
												</div>
								</div>

				</nav>
</div>
