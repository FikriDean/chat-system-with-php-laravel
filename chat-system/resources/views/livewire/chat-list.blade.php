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
																												@if ($authRoom->users->count() > 2)
																																<tr wire:click="changeWindow({{ $authRoom }})" wire:key="item-{{ $authRoom->id }}"
																																				style="height: 60px"
																																				class="@if ($authRoom->room_code == Auth::user()->window_active) bg-primary-subtle @endif">
																																				<td>
																																								<div class="d-flex align-items-center justify-content-between">
																																												<div class="w-100 d-flex align-items-start justify-content-center flex-column"
																																																style="height: 50px">

																																																<button class="border-0 bg-transparent fs-5">
																																																				{{ $authRoom->room_name }}
																																																</button>

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
																																								</div>
																																				</td>
																																</tr>
																												@else
																																<tr wire:click="changeWindow({{ $authRoom }})" wire:key="item-{{ $authRoom->id }}"
																																				style="height: 60px"
																																				class="@if ($authRoom->room_code == Auth::user()->window_active) bg-primary-subtle @endif">
																																				<td>
																																								<div class="d-flex align-items-center justify-content-between">
																																												<div class="w-100 d-flex align-items-start justify-content-center flex-column"
																																																style="height: 50px">
																																																@foreach ($authRoom->users as $authRoomUser)
																																																				@if ($authRoomUser->id != Auth::id())
																																																								<button class="border-0 bg-transparent fs-5">
																																																												{{ $authRoomUser->name }}
																																																								</button>
																																																				@endif
																																																@endforeach

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
																																								</div>
																																				</td>
																																</tr>
																												@endif
																								@endforeach
																				</div>
																</tbody>

												</table>
								</div>
				</div>

</div>
