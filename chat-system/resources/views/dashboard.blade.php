@extends('layouts.main')

@section('content')
				<div class="row">
								<div class="col-sm-4 m-0 p-0 full-screen-height">
												<div class="row">
																<div class="col-sm-12">
																				@livewire('control-side-navbar', [
																				    'user' => $user,
																				    'users' => $users,
																				])
																</div>
												</div>

												<div class="row">
																<div class="col-sm-12">


																				@livewire('chat-list', ['users' => $users])
																</div>
												</div>

								</div>

								<div class="col-sm-8 m-0 p-0 full-screen-height bg-body-tertiary d-flex flex-column justify-content-between"
												style="height: 100vh">
												<div>
																<div class="row">
																				<div class="col-sm-12">
																								@livewire('top-side-navbar', ['user' => $user])
																				</div>
																</div>

																<div class="row">
																				<div class="col-sm-12">
																								<div style="max-height: 80vh; overflow-y: scroll">
																												@livewire('chat-message')
																								</div>
																				</div>
																</div>
												</div>

												<div class="d-flex justify-content-start px-4">
																@livewire('message-input')

												</div>


								</div>
				</div>
@endsection
