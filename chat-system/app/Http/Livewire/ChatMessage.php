<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\MessageUser;
use App\Models\Message;

class ChatMessage extends Component
{
    protected $listeners = [
        'refreshChatMessages' => 'refresh'
    ];

    public $messageUsers;
    public $user;
    public $allMessages;

    public function mount()
    {
        $this->allMessages = Message::all();
        $this->user = Auth::user();
        $this->messageUsers = MessageUser::orderBy('id')->where(function ($query) {
            $query->where('user_id', $this->user->window_active)->where('message_to', $this->user->id);
        })->orWhere(function ($query) {
            $query->where('user_id', $this->user->id)->where('message_to', $this->user->window_active);
        })->get();
    }

    public function render()
    {
        return view('livewire.chat-message');
    }

    public function refresh()
    {
        $this->allMessages = Message::all();
        $this->messageUsers = MessageUser::orderBy('id')->where(function ($query) {
            $query->where('user_id', $this->user->window_active)->where('message_to', $this->user->id);
        })->orWhere(function ($query) {
            $query->where('user_id', $this->user->id)->where('message_to', $this->user->window_active);
        })->get();
    }
}
