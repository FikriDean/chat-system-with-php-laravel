<div wire:poll.keep-alive>
				<div class="p-3" style='height: 85vh; overflow-y: scroll;'>
								<table class="table table-bordered table-striped m-0 p-0 w-100 table-hover" style="cursor: pointer">
												<thead>
																<th>Contacts</th>
												</thead>
												<tbody>
																<div>
																				@foreach ($authUser->rooms as $authRoom)
																								<tr style="height: 60px" class="@if ($authRoom->room_code == Auth::user()->window_active) bg-primary-subtle @endif"
																												wire:click="changeWindow({{ $authRoom }})" wire:key="item-{{ $authUser->id }}">
																												<td>
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

																												</td>
																								</tr>
																				@endforeach



																</div>
												</tbody>

								</table>
				</div>
</div>
