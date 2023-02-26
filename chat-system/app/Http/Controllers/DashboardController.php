<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengirimkan data user yang sedang login dan seluruh user yang ada di database
        return view('dashboard', [
            'user' => Auth::user(),
            'users' => User::all()
        ]);
    }
}
