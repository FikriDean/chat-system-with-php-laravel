<div>
				<nav class="navbar d-flex flex-column bg-primary border-1 border-light border-end">
								<div class="d-flex justify-content-between align-items-center w-100">
												<a class="navbar-brand ps-4" href="{{ route('profile.edit') }}">
																<img src="{{ asset('photo_profiles/default_pp.png') }}" alt="{{ $user->name }}"
																				style="width: 50px; height: 50px" class="rounded-circle">

																<span class="fs-6 ms-1 text-white">{{ $user->name }}</span>
												</a>

												<div class="d-flex flex-row mx-2 align-items-center">
																<div class="mx-2">
																				<div>
																								<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
																												data-bs-target="#newChatCanvas" aria-controls="newChatCanvas">
																												<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#E9E8E8"
																																class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
																																<path
																																				d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
																												</svg>
																								</button>

																								<div class="offcanvas offcanvas-start" tabindex="-1" id="newChatCanvas"
																												aria-labelledby="newChatLabel">
																												<div class="offcanvas-header">
																																<h5 class="offcanvas-title" id="newChatLabel">
																																				<span class="fw-bold">Contacts on
																																								New Chat
																																				</span>
																																</h5>
																																<button type="button" class="btn-close" data-bs-dismiss="offcanvas"
																																				aria-label="Close"></button>
																												</div>
																												<div class="offcanvas-body">
																																<table class="table table-bordered table-striped m-0 p-0" id="newchat">
																																				<thead>
																																								<tr>
																																												<th>
																																																Contacts on Chat Application
																																												</th>

																																								</tr>
																																				</thead>
																																				<tbody>
																																								@foreach ($users as $user)
																																												@if ($user->id != Auth::id())
																																																<tr>
																																																				<td>
																																																								<button data-bs-dismiss="offcanvas" aria-label="Close"
																																																												class="border-0 bg-transparent">
																																																												{{ $user->name }}
																																																								</button>
																																																				</td>
																																																</tr>
																																												@endif
																																								@endforeach


																																				</tbody>
																																</table>
																												</div>
																								</div>
																				</div>
																</div>


																<div class="dropdown mx-2">
																				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#E9E8E8"
																								class="bi bi-three-dots-vertical" viewBox="0 0 16 16" data-bs-toggle="dropdown"
																								style="cursor: pointer;">
																								<path
																												d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
																				</svg>

																				<ul class="dropdown-menu">
																								<li>
																												<form action="{{ route('logout') }}" method="POST">
																																@csrf
																																<button type="submit" class="dropdown-item">Logout</button>
																												</form>
																								</li>
																				</ul>
																</div>
												</div>

								</div>

				</nav>
</div>
