<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TopSideNavbar extends Component
{
    protected $listeners = ['refreshUserTarget' => 'refresh'];

    public $room;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
        $this->room = Room::where('room_code', Auth::user()->window_active)->first();
    }

    public function render()
    {
        return view('livewire.top-side-navbar');
    }

    public function refresh($room_code)
    {
        $this->room = Room::where('room_code', $room_code)->first();
    }
}
