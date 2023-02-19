<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function refresh($contact_code)
    {
        $this->userTarget = User::where('id', '!=', Auth::id())->where('window_active', $contact_code)->first();
    }
}
