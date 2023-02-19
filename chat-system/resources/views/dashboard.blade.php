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

								{{-- @if ($user->window_active == 0)
												background-image: url('/img/no-chat-default.jpg'); background-size: contain; background-position-x: left;
								@endif --}}

								<div class="border-1 border-start col-sm-8 m-0 p-0 full-screen-height d-flex flex-column justify-content-between"
												style="height: 100vh;">
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

@section('custom_scripts')
				<script></script>
@endsection
