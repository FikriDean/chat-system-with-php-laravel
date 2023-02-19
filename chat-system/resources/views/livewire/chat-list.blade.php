<div wire:poll.keep-alive>
				<div class="p-3">
								<table class="table table-bordered table-striped m-0 p-0 w-100 table-hover" style="cursor: pointer">
												<thead>
																<th>Contacts</th>
												</thead>
												<tbody>
																<div>
																				@foreach ($users as $user)
																								@foreach ($user->contacts as $userContact)
																												@foreach ($authUser->contacts as $authContact)
																																@if ($user->id !== Auth::id())
																																				<tr style="height: 60px"
																																								class="@if ($user->id == Auth::user()->window_active) bg-primary-subtle @endif"
																																								wire:click="changeWindow({{ $authContact }})"
																																								wire:key="item-{{ $user->id }}">
																																								<td>
																																												<button class="border-0 bg-transparent fs-5">
																																																{{ $user->name }}

																																												</button>
																																												<h1 class="fs-6 fw-light fst-italic">{{ $user->status }}</h1>
																																								</td>
																																				</tr>
																																@endif
																												@endforeach
																								@endforeach
																				@endforeach
																</div>
												</tbody>

								</table>
				</div>
</div>
