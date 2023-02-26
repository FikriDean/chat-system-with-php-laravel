<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\BlockedContact;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validasi perubahan nama, username, hashtag, dan email
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:100', 'alpha_dash'],
            'hashtag' => ['required', 'string', 'max:50', 'alpha_dash', 'unique:users,hashtag,' . $request->user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        ]);

        $checkemail = $request->user()->email_verification;

        BlockedContact::where('hashtag', Auth::user()->hashtag)->update([
            'hashtag' => strtolower($request->hashtag)
        ]);

        $user = User::where('id', $request->user()->id)->update([
            'name' => $request->name,
            'username' => strtolower($request->username),
            'hashtag' => strtolower($request->hashtag),
            'email' => $request->email,
        ]);


        if ($request->file('image')) {
            $validatedDataImage = $request->validate([
                'image' => ['image', 'file', 'max:2048'],
            ]);

            $validatedDataImage['image'] = $request->file('image')->store('photo_profiles');
            $image = $request->file('image');
            $input['imageName'] = $validatedDataImage['image'];
            $destinationPath = public_path('/photo_profiles');
            $image->move($destinationPath, $input['imageName']);

            User::where('id', $request->user()->id)->update($validatedDataImage);
        }


        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
