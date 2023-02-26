<div class="flex-column justify-content-between align-items-center w-100 p-4" id="addContactDiv">
				@if ($roomHasBeenCreated == true)
								<div class="alert alert-warning d-flex align-items-center" role="alert">
												<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
																width="14" height="14" viewBox="0 0 16 16" role="img" aria-label="Warning:">
																<path
																				d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
												</svg>
												<div>
																This person is already in your Contact
												</div>
								</div>
				@endif

				@if ($accountInvalid == true)
								<div class="alert alert-primary d-flex align-items-center" role="alert">
												<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
																width="14" height="14" viewBox="0 0 16 16" role="img" aria-label="Warning:">
																<path
																				d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
												</svg>
												<div>
																User not found
												</div>
								</div>
				@endif

				@if ($newRoomCreated == true)
								<div class="alert alert-success d-flex align-items-center" role="alert">
												<svg width="14" height="14" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
																<use xlink:href="#check-circle-fill" />
												</svg>
												<div>
																Contact has been added succesfully
												</div>
								</div>
				@endif

				<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">@</span>
								<input type="text" class="form-control me-1" placeholder="Username" wire:model="username">
								<span class="input-group-text ms-1" id="basic-addon1">#</span>
								<input type="text" class="form-control" placeholder="Hashtag" wire:model="hashtag">
								@error('username')
												<span class="error mt-2 text-danger bg-light p-2 w-100">{{ $message }}</span>
								@enderror
								@error('hashtag')
												<span class="error mt-2 text-danger bg-light p-2 w-100">{{ $message }}</span>
								@enderror
				</div>

				<button type="button" class="btn btn-info w-100" wire:click="addRoomPerson">Add
								Contact</button>
</div>
