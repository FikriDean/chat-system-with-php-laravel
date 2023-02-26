<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class MessageInput extends Component
{
    // Menambahkan $listeners agar bisa di-emit dari livewire lain
    protected $listeners = [
        'refreshInput' => 'refresh',
        'closeChatMessageInput' => 'closeChat'
    ];

    // Membuat variable yang dibutuhkan
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

    // Function untuk mengirim pesan
    public function sendMessage()
    {
        // Memastikan untuk mengubah inputan menjadi string
        $bodyString = strval($this->body);

        // Mendapatkan id dari room terkait (window_active)
        $roomId = Room::where('room_code', $this->user->window_active)->first()->id;

        // Membuat message
        Message::create([
            'user_id' => $this->user->id, // Diambil dari id user yang sedang login
            'room_id' => $roomId, // Room_id diambil dari id room yang sudah didapatkan sebelumnya
            'body' => $bodyString // Diambil dari inputan
        ]);

        $this->reset('body'); // reset inputan

        // Melakukan refresh chat messages sehingga chat yang ditampilkan realtime
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
