<div>
				<nav class="navbar d-flex flex-column bg-primary border-1 border-light border-end">
								<div class="d-flex justify-content-between align-items-center w-100">
												<a class="navbar-brand ps-4 d-flex flex-row align-items-center" href="{{ route('profile.edit') }}">
																<img src="{{ asset($user->image) }}" alt="{{ $user->name }}" style="width: 50px; height: 50px"
																				class="rounded-circle">
																<div class="d-flex flex-column ms-2">
																				<span class="fs-6 text-white">{{ $user->name }}</span>
																				<span class="text-white" style="font-size: 12px">{{ $user->status }}</span>
																</div>

												</a>

												<div class="d-flex flex-row mx-2 align-items-center">
																<div class="mx-2">
																				{{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
																								data-bs-target="#newChatCanvas" aria-controls="newChatCanvas">
																								<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#E9E8E8"
																												class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
																												<path
																																d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
																								</svg>
																				</button> --}}

																				{{-- <div class="offcanvas offcanvas-start" tabindex="-1" id="newChatCanvas"
																								aria-labelledby="newChatLabel">
																								<div class="offcanvas-header">
																												<h5 class="offcanvas-title" id="newChatLabel">
																																<span class="fw-bold">Contacts on
																																				New Chat
																																</span>
																												</h5>
																												<button type="button" class="btn-close" data-bs-dismiss="offcanvas"
																																aria-label="Close"></button>
																								</div>
																								<div class="offcanvas-body">
																												<table class="table table-bordered table-striped m-0 p-0" id="newchat">
																																<thead>
																																				<tr>
																																								<th>
																																												Contacts on Chat Application
																																								</th>

																																				</tr>
																																</thead>
																																<tbody>
																																				@foreach ($users as $user)
																																								@if ($user->id != Auth::id())
																																												<tr>
																																																<td>
																																																				<button data-bs-dismiss="offcanvas" aria-label="Close"
																																																								class="border-0 bg-transparent">
																																																								{{ $user->name }}
																																																				</button>
																																																</td>
																																												</tr>
																																								@endif
																																				@endforeach


																																</tbody>
																												</table>
																								</div>
																				</div> --}}
																</div>

																<button class="btn btn-primary active" type="button" id="addContactButton">
																				<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
																								class="bi bi-person-fill-add" viewBox="0 0 16 16">
																								<path
																												d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
																								<path
																												d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
																				</svg>
																</button>

																<button class="btn btn-primary active" type="button" id="addGroupButton">
																				<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
																								class="bi bi-grid-3x3" viewBox="0 0 16 16">
																								<path
																												d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13zM1.5 1a.5.5 0 0 0-.5.5V5h4V1H1.5zM5 6H1v4h4V6zm1 4h4V6H6v4zm-1 1H1v3.5a.5.5 0 0 0 .5.5H5v-4zm1 0v4h4v-4H6zm5 0v4h3.5a.5.5 0 0 0 .5-.5V11h-4zm0-1h4V6h-4v4zm0-5h4V1.5a.5.5 0 0 0-.5-.5H11v4zm-1 0V1H6v4h4z" />
																				</svg>
																</button>


																<div class="dropdown mx-2">
																				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#E9E8E8"
																								class="bi bi-three-dots-vertical" viewBox="0 0 16 16" data-bs-toggle="dropdown"
																								style="cursor: pointer;">
																								<path
																												d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
																				</svg>

																				<ul class="dropdown-menu">
																								<li>
																												<form action="{{ route('logout') }}" method="POST">
																																@csrf
																																<button type="submit" class="dropdown-item">Logout</button>
																												</form>
																								</li>
																				</ul>
																</div>


												</div>

								</div>

								<div class="flex-column justify-content-between align-items-center w-100 p-4" id="addContactDiv">
												@if ($roomHasBeenCreated == true)
																<div class="alert alert-warning d-flex align-items-center" role="alert">
																				<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
																								width="14" height="14" viewBox="0 0 16 16" role="img" aria-label="Warning:">
																								<path
																												d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
																				</svg>
																				<div>
																								This person is already in your Contact
																				</div>
																</div>
												@endif

												@if ($accountInvalid == true)
																<div class="alert alert-primary d-flex align-items-center" role="alert">
																				<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
																								width="14" height="14" viewBox="0 0 16 16" role="img" aria-label="Warning:">
																								<path
																												d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
																				</svg>
																				<div>
																								User not found
																				</div>
																</div>
												@endif

												@if ($newRoomCreated == true)
																<div class="alert alert-success d-flex align-items-center" role="alert">
																				<svg width="14" height="14" class="bi flex-shrink-0 me-2" role="img"
																								aria-label="Success:">
																								<use xlink:href="#check-circle-fill" />
																				</svg>
																				<div>
																								Contact has been added succesfully
																				</div>
																</div>
												@endif
												<div class="input-group mb-3">
																<span class="input-group-text" id="basic-addon1">@</span>
																<input type="text" class="form-control me-1" placeholder="Username" wire:model="username">
																<span class="input-group-text ms-1" id="basic-addon1">#</span>
																<input type="text" class="form-control" placeholder="Hashtag" wire:model="hashtag">
																@error('username')
																				<span class="error mt-2 text-danger bg-light p-2 w-100">{{ $message }}</span>
																@enderror
																@error('hashtag')
																				<span class="error mt-2 text-danger bg-light p-2 w-100">{{ $message }}</span>
																@enderror
												</div>
												<button type="button" class="btn btn-info w-100" wire:click="addRoomPerson">Add
																Contact</button>
								</div>

								<div class="flex-column justify-content-center align-items-center p-4 w-100" id="addGroupDiv">
												<div>
																<table class="table table-bordered table-striped m-0 p-0" id="newGroup">
																				<thead>
																								<tr>
																												<th>
																																Create a New Group With
																												</th>

																								</tr>
																				</thead>
																				<tbody class="bg-light">
																								@foreach ($allContact as $userContact)
																												@for ($i = 0; $i < 10; $i++)
																																<tr>
																																				<td>
																																								<input class="form-check-input me-2" type="checkbox">
																																								<span>{{ $userContact->name }}</span>

																																				</td>
																																</tr>
																												@endfor
																								@endforeach
																				</tbody>
																</table>
												</div>

												<button class="btn btn-info w-100 mt-4">Create Group</button>
								</div>


				</nav>
</div>

@section('custom_scripts')
				<script>
								$(document).ready(function() {
												$('#addContactButton').click(function() {
																if ($(this).hasClass('active')) {
																				$(this).removeClass('active');
																				$('#addContactDiv').hide();

																} else {
																				$(this).addClass('active');
																				$('#addContactDiv').show();

																}
												});

												$('#addGroupButton').click(function() {
																if ($(this).hasClass('active')) {
																				$(this).removeClass('active');
																				$('#addGroupDiv').hide();

																} else {
																				$(this).addClass('active');
																				$('#addGroupDiv').show();

																}
												});

												$('#addContactButton').trigger('click');
												$('#addGroupButton').trigger('click');
								});

								$('#exames_filter').parent().attr("col-sm-12 col-md-6", "class");
				</script>
@endsection
