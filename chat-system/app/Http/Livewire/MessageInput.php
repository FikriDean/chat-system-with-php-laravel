<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageInput extends Component
{
    protected $listeners = ['refreshInputDiv' => 'refresh'];

    public $body;
    public $user;
    public $contact_code;

    protected $rules = [
        'body' => 'required|min:6|max:200'
    ];

    public function updated($body)
    {
        $this->validateOnly($body);
    }

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
        $validatedData = $this->validate();

        $validatedData['user_id'] = Auth::id();

        $validatedData['receiver'] = $this->contact_code;

        Message::create($validatedData);

        $this->reset('body');

        $this->emit('refreshChatMessages');
    }

    public function refresh()
    {
        $this->user = Auth::user();
    }
}
