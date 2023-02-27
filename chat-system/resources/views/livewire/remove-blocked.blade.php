{{-- Komponen yang digunakan untuk remove kontak yang sedang di blokir --}}

<div class="flex-column justify-content-center align-items-center p-4 w-100" id="blockedContactsDiv">
				<div>
								{{-- Bagian untuk pencarian user dengan menggunakan nama --}}
								<div class="input-group mb-3">
												<span class="input-group-text">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
																				class="bi bi-search" viewBox="0 0 16 16">
																				<path
																								d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
																</svg>
												</span>
												<input type="text" class="form-control" placeholder="Search by name" wire:model='search'>
								</div>

								{{-- Tabel untuk seluruh kontak yang diblokir --}}
								<table class="table table-bordered table-striped m-0 p-0">
												<thead>
																<tr>
																				<th class="text-light">
																								Contacts that you've blocked
																				</th>
																</tr>
												</thead>

												<tbody class="bg-light">
																{{-- Jika terdapat room(kontak) yang diblokir --}}
																@if (!empty($relatedRoomBlocked))
																				{{-- Pengulangan(kontak) yang diblokir --}}
																				@foreach ($relatedRoomBlocked as $contact)
																								{{-- Tampilkan kontak --}}
																								<tr>
																												<td>
																																<div class="input-group mb-3">
																																				<input type="text" class="form-control" disabled value="{{ $contact->name }}">
																																				<button class="btn btn-outline-success" type="button"
																																								wire:click='unblock({{ $contact->hashtag }})'>Unblock</button>
																																</div>
																												</td>
																								</tr>
																				@endforeach
																@else
																				{{-- Jika tidak terdapat kontak yang diblokir --}}
																				<tr>
																								<td>
																												There is no contact that you've blocked
																								</td>
																				</tr>
																@endif
												</tbody>
								</table>
				</div>
</div>
