{{-- Komponen yang digunakan untuk menampilkan seluruh room(kontak orang dan grup) --}}
<div>
				<div wire:poll.500ms>
								{{-- Pengecekan user yang sedang login --}}
								@if ($authUser)
												{{-- Tabel untuk kontak(chat-list) --}}
												<div class="p-3" style='height: 85vh; overflow-y: scroll;'>
																<table class="table table-bordered table-striped m-0 p-0 w-100 table-hover" style="cursor: pointer">
																				<thead>
																								<th>Contacts</th>
																				</thead>
																				<tbody>
																								<div>
																												{{-- Melakukan perulangan untuk semua room yang berkaitan dengan user yang sedang login --}}
																												@foreach ($authUser->rooms as $authRoom)
																																{{-- Pengecekan untuk room yang terdiri atas lebih dari 2 user (salah satunya user yang sedang login) --}}
																																@if ($authRoom->users->count() > 2)
																																				{{-- Membuat table row yang bisa di klik untuk mengubah window_active pada user sehingga bisa berpindah chat --}}
																																				<tr wire:click="changeWindow({{ $authRoom }})" wire:key="item-{{ $authRoom->id }}"
																																								style="height: 60px"
																																								class="@if ($authRoom->room_code == Auth::user()->window_active) bg-primary-subtle @endif">
																																								<td>
																																												<div class="d-flex align-items-center justify-content-between">
																																																<div class="w-100 d-flex align-items-start justify-content-center flex-column"
																																																				style="height: 50px">

																																																				{{-- Menampilkan nama dari room(grup) yang dituju --}}
																																																				<button class="border-0 bg-transparent fs-5">
																																																								{{ $authRoom->room_name }}
																																																				</button>

																																																				{{-- Jika terdapat message pada room(grup) --}}
																																																				@isset($authRoom->messages)
																																																								{{-- Mendapatkan message terbaru(yang terakhir dikirim oleh salah satu anggota grup) --}}
																																																								@php
																																																												$latestMessage = $authRoom->messages->sortByDesc('id')->first();
																																																								@endphp

																																																								{{-- Jika ada message dan telah didapatkan sebelumnya --}}
																																																								@isset($latestMessage)
																																																												{{-- Tampilkan body message tersebut --}}
																																																												<h1 class="fs-6 fw-light">
																																																																{{ $latestMessage->body }}
																																																												</h1>
																																																								@endisset
																																																				@endisset
																																																</div>
																																												</div>
																																								</td>
																																				</tr>
																																@else
																																				{{-- Jika jumlah user yang ada di room terdiri atas 2 orang --}}
																																				<tr wire:click="changeWindow({{ $authRoom }})"
																																								wire:key="item-{{ $authRoom->id }}" style="height: 60px"
																																								class="@if ($authRoom->room_code == Auth::user()->window_active) bg-primary-subtle @endif">
																																								<td>
																																												<div class="d-flex align-items-center justify-content-between">
																																																<div class="w-100 d-flex align-items-start justify-content-center flex-column"
																																																				style="height: 50px">
																																																				{{-- Pengulangan user-user yang ada di room --}}
																																																				@foreach ($authRoom->users as $authRoomUser)
																																																								{{-- Pengecekan untuk user(kontak orang, bukan grup) yang bukan sedang login(bukan device yang ini) untuk ditampilkan di chatlist --}}
																																																								@if ($authRoomUser->id != Auth::id())
																																																												{{-- Tampilkan nama user(kontak orang, bukan grup) tersebut --}}
																																																												<button class="border-0 bg-transparent fs-5">
																																																																{{ $authRoomUser->name }}
																																																												</button>
																																																								@endif
																																																				@endforeach

																																																				{{-- Jika terdapat message pada room(grup) --}}
																																																				@isset($authRoom->messages)
																																																								{{-- Mendapatkan message terbaru(yang terakhir dikirim oleh salah satu anggota grup) --}}
																																																								@php
																																																												$latestMessage = $authRoom->messages->sortByDesc('id')->first();
																																																								@endphp

																																																								{{-- Jika ada message dan telah didapatkan sebelumnya --}}
																																																								@isset($latestMessage)
																																																												{{-- Tampilkan body message tersebut --}}
																																																												<h1 class="fs-6 fw-light">
																																																																{{ $latestMessage->body }}
																																																												</h1>
																																																								@endisset
																																																				@endisset
																																																</div>
																																												</div>
																																								</td>
																																				</tr>
																																@endif
																												@endforeach
																								</div>
																				</tbody>

																</table>
												</div>
								@endif
				</div>

</div>
