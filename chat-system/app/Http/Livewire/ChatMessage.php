<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Message;

class ChatMessage extends Component
{
    // Menambahkan $listeners agar bisa di-emit dari livewire lain
    protected $listeners = [
        'refreshChatMessages' => 'refresh', // Menjalankan function refresh ketika di-emit dari livewire lain
        'closeChatMessage' => 'closeChat' // menjalankan function closeChat untuk menutup window yang sedang dibuka
    ];

    // Membuat variable yang dibutuhkan
    public $messages;
    public $user;

    public function mount()
    {
        $this->user = Auth::user(); // User yang sedang login

        // Mengambil messages yang berkaitan dengan room (window_active pada user yang sedang aktif) yang sedang dibuka
        $this->messages = Message::orderBy('id')->whereHas('room', function ($query) {
            $query->where('room_code', $this->user->window_active);
        })->get();
    }

    public function render()
    {
        return view('livewire.chat-message');
    }

    public function refresh($room_code)
    {
        // Melakukan refresh pada variabel messages sehingga chat dapat berjalan secara realtime
        $this->messages = Message::orderBy('id')->whereHas('room', function ($query) use ($room_code) {
            $query->where('room_code', $room_code);
        })->get();
    }

    public function closeChat()
    {
    }
}
