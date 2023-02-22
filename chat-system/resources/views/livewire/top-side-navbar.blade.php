<div>
				<div wire:poll.500ms>
								@isset($room)
												<nav class="navbar d-flex flex-column bg-primary">
																<div class="d-flex justify-content-between align-items-center w-100">
																				<a class="navbar-brand mx-4 d-flex" data-bs-toggle="collapse" href="#collapseExample" role="button"
																								aria-expanded="false" aria-controls="collapseExample">
																								<img src="
																								@if ($room->users->count() > 2) {{ asset($room->image) }} 
																								@else
																								@foreach ($room->users as $roomUser)
																								@if ($roomUser->id != $user->id) {{ asset($roomUser->image) }} @endif
																								@endforeach
																								@endif"
																												alt="" style="width: 50px; height: 50px" class="rounded-circle">
																								<div class="flex-column ms-2 d-flex justify-content-center">
																												<h1 class="ms-1 text-white" style="font-size: 14px">
																																@if ($room->users->count() > 2)
																																				@foreach ($room->users as $roomUser)
																																								@if ($roomUser->id != $user->id)
																																												- {{ $roomUser->name }}
																																								@else
																																												- {{ $roomUser->name }} (You)
																																								@endif

																																				@endforeach
																																@else
																																				@foreach ($room->users as $roomUser)
																																								@if ($roomUser->id != $user->id)
																																												{{ $roomUser->name }}
																																								@endif
																																				@endforeach
																																@endif
																												</h1>
																												<h1 class="ms-1 text-white muted" style="font-size: 10px">
																																@if ($room->users->count() > 2)
																																				Group created on {{ $room->created_at->format('Y-m-d') }}
																																@else
																																				@foreach ($room->users as $roomUser)
																																								@if ($roomUser->id != $user->id)
																																												Last online {{ $roomUser->updated_at->diffForHumans() }}
																																								@endif
																																				@endforeach
																																@endif
																												</h1>
																								</div>
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

												</nav>
								@endisset
				</div>

</div>
