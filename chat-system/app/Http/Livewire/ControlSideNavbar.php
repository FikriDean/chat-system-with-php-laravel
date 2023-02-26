<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ControlSideNavbar extends Component
{
    // Menambahkan $listeners agar bisa di-emit dari livewire lain
    protected $listeners = [
        'refreshControl' => 'refresh',
    ];

    // Membuat variable yang dibutuhkan
    public $user;

    public function mount($user, $users)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.control-side-navbar');
    }

    public function refresh()
    {
    }
}
