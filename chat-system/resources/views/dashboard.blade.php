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
																				@livewire('chat-list')
																</div>
												</div>

								</div>

								<div class="border-1 border-start col-sm-8 m-0 p-0 full-screen-height d-flex flex-column justify-content-between"
												style="height: 100vh;">
												<div class="w-100">
																<div class="row">
																				<div class="col-sm-12">
																								@livewire('top-side-navbar')
																				</div>
																</div>

																<div class="row">
																				<div class="col-sm-12">
																								@livewire('chat-message')
																				</div>
																</div>
												</div>

												<div class="h-100 d-flex justify-content-start p-2 align-items-end">
																@livewire('message-input')
												</div>
								</div>
				</div>
@endsection
