<div class="mb-3 w-100">
				@if ($user->window_active != 0)
								<div class="my-2">
												@error('body')
																<span class="error text-danger">{{ $message }}</span>
												@enderror
								</div>
								<input type="text" class="form-control" placeholder="Type a message" wire:model="body"
												wire:keydown.enter="sendMessage">
				@endif

</div>
