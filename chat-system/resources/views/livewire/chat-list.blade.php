<div wire:poll.keep-alive>
				<div class="p-3">
								<table class="table table-bordered table-striped m-0 p-0 w-100 table-hover" style="cursor: pointer">
												<thead>
																<th>Contacts</th>
												</thead>
												<tbody>
																<div>
																				@foreach ($authUser->rooms as $authRoom)
																								<tr style="height: 60px" class="" wire:click="changeWindow({{ $authRoom }})"
																												wire:key="item-{{ $authUser->id }}">
																												<td>
																																@foreach ($authRoom->users as $authRoomUser)
																																				@if ($authRoomUser->id != Auth::id())
																																								<button class="border-0 bg-transparent fs-5">
																																												- {{ $authRoomUser->name }}
																																								</button>
																																				@endif
																																@endforeach
																												</td>
																								</tr>
																				@endforeach



																</div>
												</tbody>

								</table>
				</div>
</div>
