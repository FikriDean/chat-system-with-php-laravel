<?php

namespace App\Http\Livewire;

use App\Models\BlockedContact;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;

class ChatList extends Component
{
    protected $listeners = [
        'refreshChatList' => 'refresh',
    ];

    public $rooms;
    public $authUser;
    public $room_code;
    public $blockedContacts;

    public function mount()
    {
        $this->rooms = Room::all();
        $this->authUser = Auth::user();
        $this->blockedContacts = Auth::user()->blockedContacts;
    }

    public function render()
    {
        return view('livewire.chat-list');
    }

    public function changeWindow($room)
    {
        $this->room_code = $room['room_code'];
        User::where('id', Auth::id())->update(['window_active' => $this->room_code]);

        $this->emit('refreshChatMessages', $this->room_code);
        $this->emit('refreshUserTarget', $this->room_code);
        $this->emit('refreshInput', $this->room_code);
    }

    public function refresh()
    {
        $this->rooms = Room::all();
        $this->authUser = Auth::user();
    }
}
