{{-- Komponen yang digunakan untuk menambah room(grup) --}}
<div class="flex-column justify-content-center align-items-center p-4 w-100" id="addGroupDiv">
				<div>
								{{-- Bagian untuk pencarian user dengan menggunakan username --}}
								<div class="input-group mb-3">
												<span class="input-group-text">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
																				class="bi bi-search" viewBox="0 0 16 16">
																				<path
																								d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
																</svg>
												</span>
												<input type="text" class="form-control" placeholder="Search by username" wire:model='search'>
								</div>

								{{-- Informasi yang akan ditampilkan jika tidak ada user(kontak) yang dipilih --}}
								@if (session()->has('emptySelected'))
												<div class="alert alert-danger">
																{{ session('emptySelected') }}
												</div>
								@endif

								{{-- Informasi yang akan ditampilkan jika room(grup) berhasil dibuat --}}
								@if (session()->has('roomCreated'))
												<div class="alert alert-success">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
																				class="bi bi-check-circle-fill" viewBox="0 0 16 16">
																				<path
																								d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
																</svg>
																{{ session('roomCreated') }}
												</div>
								@endif

								{{-- Tabel untuk menampilkan seluruh user(kontak) yang berkaitan dengan user yang sedang login --}}
								<table class="table table-bordered table-striped m-0 p-0">
												<thead>
																<tr>
																				<th class="text-light">
																								Create a New Group With
																				</th>
																</tr>
												</thead>
												<tbody class="bg-light">
																{{-- Pengulangan untuk seluruh room(kontak) --}}
																@foreach ($relatedRoom as $room)
																				{{-- Pengecekan untuk room yang terdiri atas 2 orang --}}
																				@if ($room->users->count() == 2)
																								{{-- Pengulangan user-user yang ada di room --}}
																								@foreach ($room->users as $relatedUser)
																												{{-- Pengecekan jika user bukanlah user yang sedang login --}}
																												@if ($relatedUser->id != Auth::id())
																																{{-- Menampilkan user --}}
																																<tr>
																																				<td>
																																								<input class="form-check-input me-2" type="checkbox"
																																												wire:model='selectedContacts' value={{ $relatedUser['id'] }}
																																												wire:key="item-{{ $relatedUser['id'] }}">
																																								<span>{{ $relatedUser['name'] }}</span>
																																				</td>
																																</tr>
																												@endif
																								@endforeach
																				@endif
																@endforeach
												</tbody>
								</table>

								{{-- Input untuk nama grup --}}
								<div class="input-group mt-4">
												<span class="input-group-text" id="basic-addon1">Group Name</span>
												<input type="text" class="form-control" placeholder="Type the name of the group..."
																wire:model='groupName'>
								</div>

								{{-- Error realtime untuk nama grup dengan menggunakan realtime validation dari livewire --}}
								@error('groupName')
												<div class="bg-danger p-2 w-100 mt-2 rounded">
																<span class="error text-white">{{ $message }}</span>
												</div>
								@enderror
				</div>

				{{-- Button untuk menjalankan function addRoomGroup(menambahkan grup) --}}
				<button class="btn btn-info w-100 mt-4" wire:click='addRoomGroup'>Create Group</button>
</div>
