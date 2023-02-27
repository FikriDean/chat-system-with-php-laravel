{{-- Komponen yang digunakan untuk mengirim pesan(message) --}}

<div class="w-100 d-flex justify-content-center">
				{{-- Pengecekan jika user sudah login --}}
				@isset($user)
								{{-- Pengecekan jika user yang sedang login sedang membuka window(chat) --}}
								@if ($user->window_active != 'none')
												<input type="text" class="form-control" placeholder="Type a message" wire:model="body"
																wire:keydown.enter="sendMessage" style="width: 95%">
								@endif
				@endisset
</div>
