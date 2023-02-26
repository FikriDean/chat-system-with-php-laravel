<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->file('image')) {
            $validatedDataImage = $request->validate([
                'image' => ['image', 'file', 'max:2048'],
            ]);

            $validatedDataImage['image'] = $request->file('image')->store('photo_profiles');
            $image = $request->file('image');
            $input['imageName'] = $validatedDataImage['image'];
            $destinationPath = public_path('/photo_profiles');
            $image->move($destinationPath, $input['imageName']);

            Room::where('room_code', Auth::user()->window_active)->update($validatedDataImage);

            return redirect('/');
        }
    }
}
