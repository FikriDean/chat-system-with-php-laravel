<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ControlSideNavbar extends Component
{
    public $user;
    public $users;
    public $username;
    public $hashtag;

    public function mount($user, $users)
    {
        $this->user = $user;
        $this->users = $users;
    }

    public function render()
    {
        return view('livewire.control-side-navbar');
    }

    public function addContact()
    {
    }
}
