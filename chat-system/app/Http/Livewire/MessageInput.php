<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\MessageUser;
use Illuminate\Support\Facades\Auth;

class MessageInput extends Component
{
    public $body;

    protected $rules = [
        'body' => 'required|min:6|max:200'
    ];

    public function updated($body)
    {
        $this->validateOnly($body);
    }

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.message-input');
    }

    public function sendMessage()
    {
        $validatedData = $this->validate();

        $message = Message::create($validatedData);

        MessageUser::create([
            'user_id' => Auth::id(),
            'message_id' => $message->id,
            'message_to' => Auth::user()->window_active,
        ]);

        $this->reset('body');

        $this->emit('refreshChatMessages');
    }
}
