<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatList extends Component
{
    public $users;
    public $authUser;
    public $contact_code;

    public function mount()
    {
        $this->users = User::where('id', '!=', Auth::id())->get();
        $this->authUser = Auth::user();
    }

    public function render()
    {
        return view('livewire.chat-list');
    }

    public function changeWindow($contact)
    {
        $this->contact_code = $contact['contact_code'];
        User::where('id', Auth::id())->update(['window_active' => $this->contact_code]);

        $this->emit('refreshChatMessages', $this->contact_code);
        $this->emit('refreshUserTarget', $this->contact_code);
        $this->emit('refreshInputDiv', $this->contact_code);
    }
}
