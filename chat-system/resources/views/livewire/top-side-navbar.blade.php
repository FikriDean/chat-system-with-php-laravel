<div>
				<div>
								@if (Auth::user()->window_active != 'none')
												@isset($room)
																<nav class="navbar d-flex flex-column bg-primary">
																				<div class="d-flex justify-content-between align-items-center w-100">
																								@if ($room->users->count() > 2)
																												<a class="navbar-brand mx-4 d-flex" data-bs-toggle="offcanvas"
																																href="#editGroup-{{ $this->room->room_code }}">
																																<img src="{{ asset($room->image) }}" style="width: 50px; height: 50px" class="rounded-circle">

																																<div class="flex-column ms-2 d-flex justify-content-center">
																																				<h1 class="ms-1 text-white" style="font-size: 14px">
																																								{{ $room->room_name }}
																																				</h1>

																																				<h1 class="ms-1 text-white muted" style="font-size: 10px">
																																								Group created on {{ $room->created_at->format('Y-m-d') }}
																																				</h1>
																																</div>

																																<div class="d-flex flex-row mx-3">
																																				<div class="dropdown dropstart mx-2">
																																								<a data-bs-toggle="dropdown"
																																												class="d-flex justify-content-center align-items-start">
																																												<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
																																																fill="#E9E8E8" class="bi bi-three-dots-vertical" viewBox="0 0 16 16"
																																																style="cursor: pointer;">
																																																<path
																																																				d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
																																												</svg>
																																								</a>

																																								<ul class="dropdown-menu">
																																												<li>
																																																<a class="dropdown-item" style="cursor: pointer;"
																																																				wire:click='closeChat'>Close
																																																				Chat
																																																</a>
																																												</li>
																																								</ul>
																																				</div>

																																				<div class="offcanvas offcanvas-end" tabindex="-1"
																																								id="editGroup-{{ $this->room->room_code }}" wire:ignore>
																																								<div class="offcanvas-header">
																																												<h5 class="offcanvas-title">
																																																@if ($room->users->count() > 2)
																																																				Edit Group
																																																@else
																																																				Edit Contact
																																																@endif

																																												</h5>
																																												<button type="button" class="btn-close" data-bs-dismiss="offcanvas"
																																																aria-label="Close"></button>
																																								</div>

																																								<div class="offcanvas-body">
																																												<div class="form-group mb-3">
																																																<form action="{{ route('uploadGroupImage') }}" method="POST"
																																																				enctype="multipart/form-data">
																																																				@csrf
																																																				<div class="d-flex justify-content-center">
																																																								<img class="mb-4" src="{{ asset($room->image) }}"
																																																												alt="{{ asset($room->room_name) }}"
																																																												style="width: 150px; height: 150px; border-radius: 50%"
																																																												id="previewImg">
																																																				</div>

																																																				<div class="input-group">
																																																								<div class="mb-3">
																																																												<label for="formFile" class="form-label">Upload/Change Group
																																																																Image</label>
																																																												<input class="form-control" type="file" name="image"
																																																																onchange="loadFile(event)">
																																																								</div>

																																																								<button class="btn btn-primary w-100" type="submit">Save
																																																												Group Image</button>
																																																				</div>
																																																</form>

																																												</div>

																																												<div class="input-group mt-5 mb-3">
																																																<span class="input-group-text">
																																																				@if ($room->users->count() > 2)
																																																								Group Name
																																																				@else
																																																								Contact Name
																																																				@endif
																																																</span>

																																																@if ($room->users->count() > 2)
																																																				<input type="text" class="form-control" placeholder="Edit Group Name"
																																																								wire:model='roomName'>
																																																@else
																																																				<input type="text" class="form-control"
																																																								placeholder="Edit Contact Name" wire:model='roomName'>
																																																@endif

																																												</div>

																																												<input type="text" wire:model='changeAlert' disabled
																																																class="w-100 rounded mb-3 p-1 border border-1 text-center">

																																												@if ($room->users->count() > 2)
																																																<button class="btn btn-primary w-100" type="button"
																																																				wire:click='saveRoomName("group")'>Save
																																																				Group Name</button>
																																												@else
																																																<button class="btn btn-primary w-100" type="button"
																																																				wire:click='saveRoomName("contact")'>Save
																																																				Contact Name</button>
																																												@endif

																																												<a class="btn btn-danger mt-3" wire:click='deleteRoom'>
																																																Delete Group
																																												</a>
																																								</div>
																																				</div>
																																</div>
																												@else
																																@foreach ($room->users as $roomUser)
																																				@if ($roomUser->id != $user->id)
																																								<a class="navbar-brand mx-4 d-flex" data-bs-toggle="offcanvas"
																																												href="#viewProfile-{{ $roomUser->id }}" role="button"
																																												aria-controls="viewProfile-{{ $roomUser->id }}">

																																												<img src="{{ asset($roomUser->image) }}" style="width: 50px; height: 50px"
																																																class="rounded-circle">


																																												<div class="flex-column ms-2 d-flex justify-content-center">
																																																<h1 class="ms-1 text-white" style="font-size: 14px">


																																																				{{ $roomUser->name }}

																																																</h1>

																																																<h1 class="ms-1 text-white muted" style="font-size: 10px">


																																																				Last online {{ $roomUser->updated_at->diffForHumans() }}

																																																</h1>
																																												</div>
																																								</a>

																																								<div class="d-flex flex-row mx-3">
																																												<div class="dropdown dropstart mx-2">
																																																<a data-bs-toggle="dropdown"
																																																				class="d-flex justify-content-center align-items-start">
																																																				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
																																																								fill="#E9E8E8" class="bi bi-three-dots-vertical"
																																																								viewBox="0 0 16 16" style="cursor: pointer;">
																																																								<path
																																																												d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
																																																				</svg>
																																																</a>

																																																<ul class="dropdown-menu">
																																																				<li>
																																																								<a class="dropdown-item" style="cursor: pointer;"
																																																												wire:click='closeChat'>Close
																																																												Chat
																																																								</a>
																																																				</li>
																																																</ul>
																																												</div>

																																												<div class="offcanvas offcanvas-end" tabindex="-1"
																																																id="viewProfile-{{ $roomUser->id }}" aria-labelledby="viewProfileLabel">
																																																<div class="offcanvas-header">
																																																				<h5 class="offcanvas-title" id="viewProfileLabel">
																																																								{{ $roomUser->username }}
																																																								#{{ $roomUser->hashtag }}
																																																				</h5>
																																																				<button type="button" class="btn-close" data-bs-dismiss="offcanvas"
																																																								aria-label="Close"></button>
																																																</div>
																																																<div class="offcanvas-body">
																																																				<div class="d-flex flex-column align-items-center">
																																																								<img class="mb-4" src="{{ asset($roomUser->image) }}"
																																																												alt="{{ asset($roomUser->name) }}"
																																																												style="width: 150px; height: 150px; border-radius: 50%">

																																																								<h1 class="fs-5">
																																																												{{ $roomUser->name }}
																																																								</h1>

																																																								<h1 class="fs-6 mt-2 fst-italic">
																																																												{{ $roomUser->status }}
																																																								</h1>

																																																								<h1 style="font-size: 12px;" class="fw-lighter mt-2">
																																																												Last online {{ $roomUser->updated_at->diffForHumans() }}
																																																								</h1>

																																																								<hr class="border border-primary border-1 opacity-75 w-50">

																																																								<h1 style="font-size: 12px;" class="fw-lighter mt-2">
																																																												Joined since {{ $roomUser->created_at->diffForHumans() }}
																																																								</h1>

																																																								<div class="d-flex justify-content-between gap-3">
																																																												<button class="btn btn-sm btn-outline-danger mt-2"
																																																																wire:click='deleteRoom'>
																																																																Remove Contact
																																																												</button>

																																																												<button class="btn btn-sm btn-danger mt-2"
																																																																wire:click='blockUser({{ $roomUser->id }})'>
																																																																Block Contact
																																																												</button>
																																																								</div>

																																																				</div>

																																																</div>
																																												</div>
																																				@endif
																																@endforeach
																								@endif
																				</div>
																</nav>
												@endisset
								@endif
				</div>

				<div wire:loading.delay.shortest class="bg-primary-subtle w-100">
								Processing Chat Room...
				</div>

</div>

<script>
				var loadFile = function(event) {
								var previewImg = document.getElementById('previewImg');
								var previewDiv = document.getElementById('previewDiv');

								previewImg.src = URL.createObjectURL(event.target.files[0]);
								previewImg.onload = function() {
												URL.revokeObjectURL(previewImg.src) // free memory
								};

								previewDiv.style.display = 'flex';
				};
</script>
