<?php

namespace App\Http\Livewire;

use App\Models\BlockedContact;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;

class ChatList extends Component
{
    // Menambahkan $listeners agar bisa di-emit dari livewire lain
    protected $listeners = [
        'refreshChatList' => 'refresh', // Menjalankan function refresh ketika di emit dari livewire lain
    ];

    // Membuat variabel-variable yang dibutuhkan
    public $rooms;
    public $authUser;
    public $room_code;
    public $blockedContacts;

    public function mount()
    {
        // Mengisi variabel-variabel yang dibutuhkan
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
        // Mengubah data-data yang ditampilkan
        $this->room_code = $room['room_code'];

        // Meng-update kolom window_active pada user yang sedang aktif (untuk di sinkronisasikan dengan room tujuan)
        User::where('id', Auth::id())->update(['window_active' => $this->room_code]);

        // melakukan refresh pada livewire ChatMessage, topSideNavbar, dan MessageInput
        $this->emit('refreshChatMessages', $this->room_code);
        $this->emit('refreshUserTarget', $this->room_code);
        $this->emit('refreshInput', $this->room_code);
    }

    public function refresh()
    {
        // Melakukan refresh pada livewire ChatList
        $this->rooms = Room::all();
        $this->authUser = Auth::user();
    }
}
