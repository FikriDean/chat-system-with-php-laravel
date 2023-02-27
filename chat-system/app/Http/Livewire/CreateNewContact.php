<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Room;
use App\Models\BlockedContact;
use Illuminate\Support\Facades\Auth;

class CreateNewContact extends Component
{
    // Komponen yang digunakan untuk menambah room(kontak)

    // Membuat variable yang dibutuhkan
    public $user;
    public $username;
    public $hashtag;
    public $allContact = [];

    // Variable yang digunakan ketika ada informasi yang muncul
    public $roomHasBeenCreated = false;
    public $accountInvalid = false;
    public $newRoomCreated = false;
    public $contactIsBlocked = false;

    // Validasi realtime dari livewire
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        // Meng-set ulang agar alertnya hilang ketika user melakukan typing
        $this->roomHasBeenCreated = false;
        $this->accountInvalid = false;
        $this->newRoomCreated = false;
        $this->contactIsBlocked = true;
    }

    protected $rules = [
        // Model-model yang akan di validasi secara realtime dari livewire
        'username' => 'required|min:6|max:50',
        'hashtag' => 'required|min:3|max:50'
    ];

    public function render()
    {
        return view('livewire.create-new-contact');
    }

    // Function untuk mendapatkan kode yang akan digunakan pada room
    function getRoomCode()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    // Function untuk menambah kontak
    public function addRoomPerson()
    {
        // Mengecek apakah user yang dicari ada di database
        $accountValid = User::where('username', $this->username)->where('hashtag', $this->hashtag)->first();

        // Menampilkan alert ketika user yang akan ditambahkan tidak ada di database
        if (!$accountValid) {
            $this->accountInvalid = true;
            $this->contactIsBlocked = false;
            $this->roomHasBeenCreated = false;
            return;
        }

        // Mengecek apakah user yang dicari sedang di blokir oleh user yang sedang login
        $checkBlocked = BlockedContact::where('hashtag', $this->hashtag)->first();

        // Menampilkan alert ketika user yang akan ditambahkan sedang di blokir
        if ($checkBlocked) {
            $this->accountInvalid = false;
            $this->contactIsBlocked = true;
            $this->roomHasBeenCreated = false;
            return;
        }

        // Mendapatkan data room yang dimana terdiri atas user yang berkaitan
        $roomAlreadyExists = Room::whereHas('users', function ($query) {
            $query->where('username', $this->username)->where('hashtag', $this->hashtag);
        })->get();

        // Mengecek apakah user(room) sudah terdaftar di kontak
        foreach ($roomAlreadyExists as $room) {
            // Pengecekan apakah room tersebut terdiri atas 2 user
            if ($room->users->count() == 2) {
                foreach ($room->users as $roomUser) {
                    // Pengecekan apakah di dalam room tersebut ada user yang sedang login (jika benar, berarti sudah terdaftar)
                    if ($roomUser->hashtag == Auth::user()->hashtag) {
                        $this->accountInvalid = false;
                        $this->contactIsBlocked = false;
                        $this->roomHasBeenCreated = true; // Menampilkan pesan bahwa sudah terdaftar
                        return;
                    }
                }
            }
        };

        // Room akan dibuat
        $newRoom = Room::create([
            'room_code' => $this->getRoomCode(), // room_code didapatkan dengan menggunakan function getRoomCode
            'room_name' => $accountValid->name . ' ' . Auth::user()->username // room_name akan diisi dengan nama dari akun yang akan didaftarkan + nama yang sedang login guna mencari target user(yang tidak sedang login) di kedua sisi user yang ada di room (bukan cara terbaik)
        ]);

        // Melakukan attach user-user yang berkaitan dengan room yang baru saja dibuat
        User::where('id', auth::id())->first()->rooms()->attach($newRoom['id']);
        User::where('username', $this->username)->where('hashtag', $this->hashtag)->first()->rooms()->attach($newRoom['id']);

        // Menampilkan pesan bahwa room telah berhasil dibuat
        $this->newRoomCreated = true;

        // Melakukan refresh pada ChatList sehingga list kontak akan langsung ter-update
        $this->emit('refreshContact');
    }
}
