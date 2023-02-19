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

    public function mount()
    {
        $this->user = Auth::user();
        $this->messages = Message::orderBy('id')->where(function ($query) {
            $query->where('user_id', $this->user->window_active)->where('receiver', $this->user->id);
        })->orWhere(function ($query) {
            $query->where('user_id', $this->user->id)->where('receiver', $this->user->window_active);
        })->get();
    }

    public function render()
    {
        return view('livewire.chat-message');
    }

    public function refresh($contact_code)
    {
        $this->user = Auth::user();
        $this->messages = Message::orderBy('id')->where(function ($query) use ($contact_code) {
            $query->where('user_id', $this->user->window_active)->where('receiver', $contact_code);
        })->orWhere(function ($query) use ($contact_code) {
            $query->where('user_id', $this->user->id)->where('receiver', $contact_code);
        })->get();
    }
}
