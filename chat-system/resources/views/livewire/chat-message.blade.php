{{-- Komponen untuk menampilkan seluruh chat --}}
<div>
				{{-- Pengecekan jika window_active pada user yang sedang login bukan berupa string 'none'(menandakan bahwa ada chat(room) yang sedang dibuka) --}}
				@if (Auth::user()->window_active != 'none')
								<div style="max-height: 75vh; overflow-y: scroll;" id="messagesDiv">
												{{-- Jika terdapat message pada chat --}}
												@isset($messages)
																<div wire:poll.500ms>
																				{{-- Melakukan perulangan pada message-message yang didapatkan dari database --}}
																				@foreach ($messages as $message)
																								<div
																												class="ms-4 d-flex align-items-center @if (Auth::id() == $message->user->id) justify-content-end @endif">
																												<div>
																																<img src="{{ asset($message->user->image) }}" style="height: 40px; width: 40px;"
																																				class="rounded-circle">
																												</div>

																												{{-- Mengatur posisi chat untuk user yang sedang login di bagian kanan dan user selain user yang sedang login tersebut diposisikan di sebelah kiri --}}
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
								{{-- Jika window active adalah string 'none'(menandakan bahwa tidak ada chat(room) yang sedang dibuka  --}}
								<div class="d-flex justify-content-center chat-background" style="height: 100vh">
								</div>
				@endif
</div>

{{-- Selalu scroll kebawah ketika window(chat) dibuka dan auto scroll juga ketika message dikirim --}}
<script>
				// scroll ke chat paling bawah ketika room(chat) dibuka
				var elem = document.getElementById('messagesDiv');
				elem.scrollTop = elem.scrollHeight;

				// Function autoscroll digunakan untuk scroll ke chat message paling bawah
				function autoScroll() {
								var elem = document.getElementById('messagesDiv');
								elem.scrollTop = elem.scrollHeight;
				}

				// Ketika kontek dirubah, function autoScroll akan dijalankan
				window.addEventListener('contentChanged', () => {
								autoScroll();
				});
</script>
