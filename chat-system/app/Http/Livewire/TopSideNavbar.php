<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use App\Models\BlockedContact;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class TopSideNavbar extends Component
{
    use WithFileUploads;

    // Menambahkan $listeners agar bisa di-emit dari livewire lain
    protected $listeners = ['refreshUserTarget' => 'refresh'];

    // Membuat variable yang dibutuhkan
    public $room;
    public $user;
    public $roomName;
    public $changeAlert;
    public $photo;

    public function mount()
    {
        $this->user = Auth::user(); // User yang sedang login

        // pengecekan jika kolom window_active != none (Terdapat room yang sedang dibuka)
        if (Auth::user()->window_active != 'none') {
            // Mendapatkan room yang berkaitan dengan window_active dengan menyesuaikan room_code
            $this->room = Room::where('room_code', Auth::user()->window_active)->first();

            if ($this->room) {
                $this->roomName = $this->room->room_name;
            }
        } else {
            $this->room = null;
        }
    }

    public function render()
    {
        return view('livewire.top-side-navbar');
    }

    public function refresh($room_code)
    {
        // Pengecekan jika tidak ada room yang dibuka
        if ($room_code == 'none') {
            $this->room = null;
        }

        // Pengecekan jika ada room(window_active) yang sedang dibuka
        if (Auth::user()->window_active != 'none' && $room_code != 'none') {
            // Mencari room yang sesuai
            $this->room = Room::where('room_code', $room_code)->first();

            // Mengambil room_name dari room yang didapatkan sebelumnya
            $this->roomName = $this->room->room_name;
        }
    }

    // Function untuk menutup chat(window)
    public function closeChat()
    {
        // Meng-update kolom window_active pada user yang sedang login
        User::where('id', $this->user->id)->update([
            'window_active' => 'none'
        ]);

        $this->refresh('none'); // Merefresh livewire TopSideNavbar dan mengirimkan parameter string 'none'

        $this->emit('closeChatMessageInput'); // Close message input
        $this->emit('closeChatMessage'); // Menutup seluruh message
    }

    // Function Mengubah Nama Room(grup)
    public function saveRoomName($type)
    {
        // Pengecekan apakah tipe nya grup
        if ($type == 'group') {
            // Validasi panjang nama grup
            if (strlen($this->roomName) >= 6 && strlen($this->roomName) <= 50) {
                // Pengecekan apakah nama grup yang diinput sama dengan nama grup yang ada di database
                if ($this->room->room_name == $this->roomName) {
                    // Informasi terkait kesamaan pada nama grup
                    $this->changeAlert = 'Try different name for your group';
                } else {
                    // Memperbaharui room terkait(dicocokkan dengan room_code)
                    Room::where('room_code', $this->room->room_code)->update([
                        'room_name' => $this->roomName
                    ]);

                    // Informasi proses perubahan berhasil dilakukan
                    $this->changeAlert = 'Name change was successful';

                    // Refresh livewire TopSideNavbar
                    $this->refresh($this->room->room_code);
                }
            } else {
                // Informasi nama yang diinput terlalu pendek atau panjang
                $this->changeAlert = 'Name is too short(min:6) or too long(min:50)';
                return;
            }
        } else {
            // Informasi perubahan nama gagal dilakukan
            $this->changeAlert = 'Name change was not successful';
            return;
        }
    }

    // Function delete room
    public function deleteRoom()
    {
        // Menghapus room terkait yang dicocokkan dengan room_code
        Room::where('room_code', $this->room->room_code)->delete();

        // Menjalankan function closeChat (menutup chat)
        $this->closeChat();

        // Merefresh chat list
        $this->emit('refreshChatList');
    }

    // Function untuk memblokir user
    public function blockUser($id)
    {
        // Pengecekan jika parameter id tidak ada
        if ($id == null) {
            return;
        }

        // Menghapus room terkait dengan mencocokkan room_code
        Room::where('room_code', $this->room->room_code)->delete();

        // Mendapatkan user dengan id(parameter)
        $user = User::where('id', $id)->first();

        // Pengecekan jika user tidak ditemukan
        if (!$user) {
            return;
        }

        // Membuat BlockedContact(model) dengan data-data dari user yang sudah didapatkan
        BlockedContact::create([
            'user_id' => Auth::id(),
            'name' => $user->name,
            'username' => $user->username,
            'hashtag' => $user->hashtag
        ]);

        // Menutup chat dengan menjalankan function closeChat
        $this->closeChat();

        $this->emit('refreshChatList'); // Merefresh ChatList
        $this->emit('refreshBlockedContacts'); // Merefresh list blocked contacts
    }
}
