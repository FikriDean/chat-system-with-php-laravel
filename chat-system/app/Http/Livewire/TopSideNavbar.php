<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class TopSideNavbar extends Component
{
    protected $listeners = ['refreshUserTarget' => 'refresh'];

    public $user;
    public $userTarget;

    public function mount($user)
    {
        $this->user = $user;

        if ($user->window_active != 0) {
            $this->userTarget = User::where('id', $user->window_active)->first();
        }
    }

    public function render()
    {
        return view('livewire.top-side-navbar');
    }

    public function refresh()
    {
        $this->userTarget = User::where('id', $this->user->window_active)->first();
    }
}
