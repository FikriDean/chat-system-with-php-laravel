<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ControlSideNavbar extends Component
{
    // Komponen kontrol untuk profil user yang sedang login(link untuk cek profil, dropdown logout)

    // Menambahkan $listeners agar bisa di-emit dari livewire lain
    protected $listeners = [
        'refreshControl' => 'refresh',
    ];

    // Membuat variable yang dibutuhkan
    public $user;

    public function mount($user, $users)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.control-side-navbar');
    }

    public function refresh()
    {
    }
}
