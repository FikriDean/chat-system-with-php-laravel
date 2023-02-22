<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Message;

class ChatMessage extends Component
{
    protected $listeners = [
        'refreshChatMessages' => 'refresh'
    ];

    public $messages;
    public $user;

    public function render()
    {
        return view('livewire.chat-message');
    }

    public function refresh($room_code)
    {
        $this->user = Auth::user();
        $this->messages = Message::orderBy('id')->whereHas('room', function ($query) use ($room_code) {
            $query->where('room_code', $room_code);
        })->get();
    }
}
