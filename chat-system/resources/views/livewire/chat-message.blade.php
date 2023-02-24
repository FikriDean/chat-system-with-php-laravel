<div>
				@if (Auth::user()->window_active != 'none')
								<div style="max-height: 75vh; overflow-y: scroll;">
												@isset($messages)
																<div wire:poll.500ms>
																				@foreach ($messages as $message)
																								<div
																												class="ms-4 d-flex align-items-center @if (Auth::id() == $message->user->id) justify-content-end @endif">
																												<div>
																																<img src="{{ asset($message->user->image) }}" style="height: 40px" class="rounded-circle">
																												</div>

																												<div class="d-flex flex-column mx-4 p-3 my-4 message-background d-flex justify-content-center @if ($message->user->id != $user->id) align-items-start @else align-items-end @endif rounded"
																																style="min-height: 40px; max-height: 70px">
																																<h1 class="fs-6">{{ $message->user->name }}</h1>
																																<h1 class="message" style="font-size: 12px">{{ $message->body }}</h1>
																												</div>
																								</div>
																				@endforeach
																</div>
												@endisset
								</div>
				@else
								<div class="d-flex justify-content-center chat-background" style="height: 100vh">
								</div>
				@endif
</div>
