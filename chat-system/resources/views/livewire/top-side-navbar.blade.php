{{-- Komponen yang digunakan untuk mengecek/mengatur profile room(kontak dan grup) dan menutup chat --}}

<div>
				<div>
								{{-- Pengecekan jika user yang sedang login sedang membuka window(chat) --}}
								@if (Auth::user()->window_active != 'none')
												{{-- Pengecekan jika terdapat data room yang sedang dibuka --}}
												@isset($room)
																<nav class="navbar d-flex flex-column bg-primary">
																				<div class="d-flex justify-content-between align-items-center w-100">
																								{{-- Jika room(chat) terdiri atas lebih dari 2 orang(grup) --}}
																								@if ($room->users->count() > 2)
																												{{-- button untuk membuka offcanvas untuk detail/edit grup --}}
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

																																								{{-- Close chat --}}
																																								<ul class="dropdown-menu">
																																												<li>
																																																<a class="dropdown-item" style="cursor: pointer;"
																																																				wire:click='closeChat'>Close
																																																				Chat
																																																</a>
																																												</li>
																																								</ul>
																																				</div>

																																				{{-- Offcanvas yang digunakan untuk detail/edit grup --}}
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
																																																{{-- Edit foto profil grup --}}
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

																																												{{-- Edit grup name --}}
																																												<div class="input-group mt-5 mb-3">
																																																<span class="input-group-text">
																																																				Group Name
																																																</span>

																																																<input type="text" class="form-control" placeholder="Edit Group Name"
																																																				wire:model='roomName'>
																																												</div>

																																												{{-- Informasi-informasi yang ditampilkan --}}
																																												<input type="text" wire:model='changeAlert' disabled
																																																class="w-100 rounded mb-3 p-1 border border-1 text-center">

																																												<button class="btn btn-primary w-100" type="button"
																																																wire:click='saveRoomName("group")'>Save
																																																Group Name</button>

																																												{{-- Delete Grup --}}
																																												<a class="btn btn-danger mt-3" wire:click='deleteRoom'>
																																																Delete Group
																																												</a>
																																								</div>
																																				</div>
																																</div>
																												@else
																																{{-- Pengulangan untuk user-user yang ada di room(kontak) --}}
																																@foreach ($room->users as $roomUser)
																																				{{-- Pengecekan user yang bukan merupakan user yang sedang login --}}
																																				@if ($roomUser->id != $user->id)
																																								{{-- Link untuk membuka offcanvas detail room(kontak) --}}
																																								<a class="navbar-brand mx-4 d-flex" data-bs-toggle="offcanvas"
																																												href="#viewProfile-{{ $roomUser->id }}" role="button"
																																												aria-controls="viewProfile-{{ $roomUser->id }}">

																																												{{-- Menampilkan data-data user --}}
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
																																																								fill="#E9E8E8" class="bi bi-three-dots-vertical" viewBox="0 0 16 16"
																																																								style="cursor: pointer;">
																																																								<path
																																																												d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
																																																				</svg>
																																																</a>

																																																{{-- Close chat --}}
																																																<ul class="dropdown-menu">
																																																				<li>
																																																								<a class="dropdown-item" style="cursor: pointer;"
																																																												wire:click='closeChat'>Close
																																																												Chat
																																																								</a>
																																																				</li>
																																																</ul>
																																												</div>

																																												{{-- Offcanvas untuk detail user --}}
																																												<div class="offcanvas offcanvas-end" tabindex="-1"
																																																id="viewProfile-{{ $roomUser->id }}" aria-labelledby="viewProfileLabel">
																																																{{-- Menampilkan detail user --}}
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

																																																								{{-- Button untuk remove dan block room(kontak) --}}
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

				{{-- Wire loading untuk proses di window chat --}}
				<div wire:loading.delay.shortest class="bg-primary-subtle w-100">
								Processing Chat Room...
				</div>

</div>

<script>
				// Proses preview img menggunakan javascript
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
