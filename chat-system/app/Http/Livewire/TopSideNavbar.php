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
        $this->userTarget = User::where('id', $user->window_active)->first()->name;
    }

    public function render()
    {
        return view('livewire.top-side-navbar');
    }

    public function refresh()
    {
        $this->userTarget = User::where('id', $this->user->window_active)->first()->name;
    }
}
