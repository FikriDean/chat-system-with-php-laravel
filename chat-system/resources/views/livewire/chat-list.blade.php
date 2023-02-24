<div>
				<div wire:poll.500ms>
								<div class="p-3" style='height: 85vh; overflow-y: scroll;'>
												<table class="table table-bordered table-striped m-0 p-0 w-100 table-hover" style="cursor: pointer">
																<thead>
																				<th>Contacts</th>
																</thead>
																<tbody>
																				<div>
																								@foreach ($authUser->rooms as $authRoom)
																												<tr wire:click="changeWindow({{ $authRoom }})" wire:key="item-{{ $authRoom->id }}"
																																style="height: 60px" class="@if ($authRoom->room_code == Auth::user()->window_active) bg-primary-subtle @endif">
																																<td>
																																				<div class="d-flex align-items-center justify-content-between">
																																								<div class="w-100 d-flex align-items-start justify-content-center flex-column"
																																												style="height: 50px">
																																												@if ($authRoom->users->count() < 3)
																																																@foreach ($authRoom->users as $authRoomUser)
																																																				@if ($authRoomUser->id != Auth::id())
																																																								<button class="border-0 bg-transparent fs-5">
																																																												{{ $authRoomUser->name }}
																																																								</button>
																																																				@endif
																																																@endforeach
																																												@else
																																																<button class="border-0 bg-transparent fs-5">
																																																				{{ $authRoom->room_name }}
																																																</button>
																																												@endif

																																												@isset($authRoom->messages)
																																																@php
																																																				$latestMessage = $authRoom->messages->sortByDesc('id')->first();
																																																@endphp

																																																@isset($latestMessage)
																																																				<h1 class="fs-6 fw-light">
																																																								{{ $latestMessage->body }}
																																																				</h1>
																																																@endisset
																																												@endisset
																																								</div>


																																								{{-- <div class="dropdown">
																																			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
																																							fill="#2B3467" class="bi bi-three-dots-vertical" viewBox="0 0 16 16"
																																							data-bs-toggle="dropdown" style="cursor: pointer;">
																																							<path
																																											d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
																																			</svg>

																																			<ul class="dropdown-menu">
																																							<li><a class="dropdown-item" href="#">Edit Contact Name</a></li>
																																							<li><a class="dropdown-item" href="#">Delete Contact</a></li>
																																			</ul>
																															</div> --}}
																																				</div>

																																</td>

																												</tr>
																								@endforeach
																				</div>
																</tbody>

												</table>
								</div>
				</div>

</div>
