<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class MessageInput extends Component
{
    protected $listeners = [
        'refreshInput' => 'refresh',
        'closeChatMessageInput' => 'closeChat'
    ];

    public $body;
    public $user;
    public $contact_code;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.message-input');
    }

    public function sendMessage()
    {
        $bodyString = strval($this->body);

        $roomId = Room::where('room_code', $this->user->window_active)->first()->id;

        Message::create([
            'user_id' => $this->user->id,
            'room_id' => $roomId,
            'body' => $bodyString
        ]);

        $this->reset('body');

        $this->emit('refreshChatMessages', $this->user->window_active);
    }

    public function refresh()
    {
        $this->user = Auth::user();
    }

    public function closeChat()
    {
    }
}
