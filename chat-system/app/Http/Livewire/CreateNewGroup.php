<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;

class CreateNewGroup extends Component
{
    // Membuat variable yang dibutuhkan
    public $user;
    public $selectedContacts = [];
    public $groupName;
    public $search;

    // Menambahkan query search(realtime dari livewire)
    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'] // menyingkatkan dari 'search' ke 's'
    ];

    // Menambahkan $listeners agar bisa di-emit dari livewire lain
    protected $listeners = ['refreshContact' => 'refresh'];

    // Validasi realtime dari livewire
    protected $rules = [
        'groupName' => 'required|min:6|max:50',
    ];

    // Function validasi realtime dari livewire
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($user)
    {
        $this->user = $user; // User yang sedang login
    }

    public function render()
    {
        return view('livewire.create-new-group', [
            // Melakukan query room yang berkaitan dengan user yang sedang login
            // Dilakukan dengan menyocokkan username
            // Ditambah dengan query search realtime dari livewire
            'relatedRoom' => Room::whereHas('users', function ($query) {
                $query->where('username', Auth::user()->username);
            })->where('room_name', 'like', '%' . $this->search . '%')->get()
        ]);
    }

    // Function yang akan digunakan untuk mendapatkan kode yang akan digunakan pada room terkait
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

    public function addRoomGroup()
    {
        $this->validate();

        // Pengecekan yang dimana harus ada 2 kontak yang dipilih untuk membuat grup (total 3 dengan user yang login)
        if (count($this->selectedContacts) < 2) {
            session()->flash('emptySelected', 'You must to choose at least 2 contact to make a group with.');
            return;
        }

        // Membuat room baru
        $newRoom = Room::create([
            'room_code' => $this->getRoomCode(), // room_code didapatkan dengan menggunakan function getRoomCode
            'room_name' => $this->groupName // room_name akan diisi dengan value dari variabel groupName
        ]);

        // Melakukan attach user yang sedang login dengan room yang baru saja dibuat
        User::where('id', auth::id())->first()->rooms()->attach($newRoom['id']);

        // Melakukan attach user-user yang berkaitan dengan room yang baru saja dibuat
        foreach ($this->selectedContacts as $userContactId) {
            User::where('id', $userContactId)->first()->rooms()->attach($newRoom['id']);
        }

        // Menjalankan function refresh
        $this->refresh();

        // Memberikan informasi pembuatan grup telah berhasil
        session()->flash('roomCreated', 'Group created succesfully.');
    }

    public function refresh()
    {
        $this->selectedContacts = [];
        $this->groupName = [];
    }
}
