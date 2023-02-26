<section>
				<header>
								<h2 class="text-lg font-medium text-gray-900">
												{{ __('Profile Information') }}
								</h2>

								<p class="mt-1 text-sm text-gray-600">
												{{ __("Update your account's profile information and email address.") }}
								</p>
				</header>

				<form id="send-verification" method="post" action="{{ route('verification.send') }}">
								@csrf
				</form>

				<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
								@csrf
								@method('patch')

								<div>
												<div class="form-group row">
																<div class="col-sm-12">
																				<div class="form-group row">
																								<div class="col-sm-12">
																												<x-input-label for="image" :value="__('Photo Profile')" />
																												<div class="form-group mt-2">
																																<img class="mb-4" src="{{ asset(Auth::user()->image) }}"
																																				alt="{{ Auth::user()->username }}"
																																				style="width: 150px; height: 150px; border-radius: 50%" id="previewImg">

																																<div class="mt-2">
																																				<input class="form-control" type="file" name="image"
																																								onchange="loadFile(event)">
																																</div>
																												</div>
																								</div>
																				</div>
																</div>
												</div>
								</div>

								<div>
												<x-input-label for="name" :value="__('Name')" />
												<x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
																required autofocus autocomplete="name" />
												<x-input-error class="mt-2" :messages="$errors->get('name')" />
								</div>

								<div>
												<x-input-label for="username" :value="__('Username')" />
												<x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)"
																required autofocus autocomplete="username" />
												<x-input-error class="mt-2" :messages="$errors->get('username')" />
								</div>

								<div>
												<x-input-label for="hashtag" :value="__('Hashtag')" />
												<x-text-input id="hashtag" name="hashtag" type="text" class="mt-1 block w-full" :value="old('hashtag', $user->hashtag)"
																required autofocus autocomplete="hashtag" />
												<x-input-error class="mt-2" :messages="$errors->get('hashtag')" />
								</div>

								<div>
												<x-input-label for="email" :value="__('Email')" />
												<x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
																required autocomplete="email" />
												<x-input-error class="mt-2" :messages="$errors->get('email')" />

												@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
																<div>
																				<p class="text-sm mt-2 text-gray-800">
																								{{ __('Your email address is unverified.') }}

																								<button form="send-verification"
																												class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
																												{{ __('Click here to re-send the verification email.') }}
																								</button>
																				</p>

																				@if (session('status') === 'verification-link-sent')
																								<p class="mt-2 font-medium text-sm text-green-600">
																												{{ __('A new verification link has been sent to your email address.') }}
																								</p>
																				@endif
																</div>
												@endif
								</div>

								<div class="flex items-center gap-4">
												<x-primary-button>{{ __('Save') }}</x-primary-button>

												@if (session('status') === 'profile-updated')
																<p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
																				class="text-sm text-gray-600">{{ __('Saved.') }}</p>
												@endif
								</div>
				</form>
</section>

<script>
				var loadFile = function(event) {
								var previewImg = document.getElementById('previewImg');
								var previewDiv = document.getElementById('previewDiv');

								previewImg.src = URL.createObjectURL(event.target.files[0]);
								previewImg.onload = function() {
												URL.revokeObjectURL(previewImg.src) // free memory
								};

								previewDiv.style.display = 'flex';
				};
</script>
