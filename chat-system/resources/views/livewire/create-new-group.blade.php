<div class="flex-column justify-content-center align-items-center p-4 w-100" id="addGroupDiv">
				<div>
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

								<table class="table table-bordered table-striped m-0 p-0">
												<thead>
																<tr>
																				<th class="text-light">
																								Create a New Group With
																				</th>
																</tr>
												</thead>
												<tbody class="bg-light">
																@foreach ($allContacts as $userContact)
																				@foreach ($userContact->rooms as $userRoom)
																								@if ($userRoom->users->count() == 2 && $userRoom->users->where('id', Auth::id()))
																												<tr>
																																<td>
																																				<input class="form-check-input me-2" type="checkbox" wire:model='selectedContact'
																																								value={{ $userContact['id'] }}>
																																				<span>{{ $userContact['name'] }}</span>
																																</td>
																												</tr>
																								@endif
																				@endforeach
																@endforeach
												</tbody>
								</table>
				</div>

				<button class="btn btn-info w-100 mt-4">Create Group</button>
</div>
