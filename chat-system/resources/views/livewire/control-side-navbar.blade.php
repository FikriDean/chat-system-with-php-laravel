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

								@livewire('create-new-contact')

								@livewire('create-new-group', ['user' => $user])


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
				</script>
@endsection
