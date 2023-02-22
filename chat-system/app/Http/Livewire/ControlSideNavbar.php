<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ControlSideNavbar extends Component
{
    public $user;

    public function mount($user, $users)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.control-side-navbar');
    }
}
