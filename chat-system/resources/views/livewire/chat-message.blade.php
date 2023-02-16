<div>
				<div wire:poll.500ms>
								@foreach ($messages as $message)
												<div
																class="d-flex flex-row align-items-center test @if (Auth::id() == $message->user->id) justify-content-end @endif)">
																<div>
																				<img src="{{ asset('photo_profiles/default_pp.png') }}" alt="" style="height: 40px"
																								class="rounded-circle">
																				{{ $message->user->name }}
																</div>

																<div class="mx-4 px-3 my-4 chat-background text-end d-flex justify-content-end align-items-center rounded"
																				style="height: 40px">
																				<span>{{ $message->body }}</span>
																</div>
												</div>
								@endforeach
				</div>

</div>

@section('custom_scripts')
				<script></script>
@endsection
