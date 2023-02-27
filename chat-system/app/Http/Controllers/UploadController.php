<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    // Digunakan untuk mengunggah foto profil grup
    public function upload(Request $request)
    {
        // Mengecek request file bernama image
        if ($request->file('image')) {
            // Melakukan validasi pada image yang diupload
            $validatedDataImage = $request->validate([
                'image' => ['image', 'file', 'max:2048'],
            ]);

            // Melakukan proses upload image
            $validatedDataImage['image'] = $request->file('image')->store('photo_profiles');
            $image = $request->file('image');
            $input['imageName'] = $validatedDataImage['image'];
            $destinationPath = public_path('/photo_profiles');
            $image->move($destinationPath, $input['imageName']);

            // Memperbaharui room_image terkait
            Room::where('room_code', Auth::user()->window_active)->update($validatedDataImage);

            return redirect('/');
        }
    }
}
