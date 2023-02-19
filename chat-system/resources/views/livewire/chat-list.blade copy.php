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
																																@if ($userContact->contact_code == $authContact->contact_code)
																																				<tr style="height: 60px"
																																								class="@if ($userContact->contact_code == Auth::user()->window_active) bg-primary-subtle @endif"
																																								wire:click="changeWindow({{ $userContact->contact_code }})">
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
