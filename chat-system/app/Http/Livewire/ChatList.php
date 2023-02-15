<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatList extends Component
{
    public $users;

    public function mount($users)
    {
        $this->users = $users;
    }

    public function render()
    {
        return view('livewire.chat-list', []);
    }

    public function changeWindow($id)
    {
        User::where('id', Auth::id())->update(['window_active' => $id]);

        $this->emit('refreshChatMessages');
        $this->emit('refreshUserTarget');
    }
}
