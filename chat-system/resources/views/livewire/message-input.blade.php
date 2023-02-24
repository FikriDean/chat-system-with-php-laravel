<div class="w-100 d-flex justify-content-center">
				@if (Auth::user()->window_active != 'none')
								@isset($user)
												<input type="text" class="form-control" placeholder="Type a message" wire:model="body"
																wire:keydown.enter="sendMessage" style="width: 95%">
								@endisset
				@endif
</div>
