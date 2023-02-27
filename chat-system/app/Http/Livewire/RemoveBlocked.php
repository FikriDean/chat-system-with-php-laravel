<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\BlockedContact;
use App\Models\Room;

class RemoveBlocked extends Component
{
    // Komponen yang digunakan untuk remove kontak yang sedang di blokir

    // Menambahkan $listeners agar bisa di-emit dari livewire lain
    protected $listeners = ['refreshBlockedContacts' => 'refresh'];

    // Variable kontak yang di blokir user yang login
    public $search;

    // Menambahkan query search(realtime dari livewire)
    protected $queryString = [
        'search' => ['except' => '', 'as' => 'sb'] // menyingkatkan dari 'search' ke 's'
    ];

    public function render()
    {
        return view('livewire.remove-blocked', [
            'relatedRoomBlocked' => BlockedContact::where('user_id', Auth::id())->where('name', 'like', '%' . $this->search . '%')->get()
        ]);
    }

    public function refresh()
    {
    }

    // Function unblock Contact
    public function unblock($hashtag)
    {
        // Mendapatkan kontak yang diblokir dengan mencocokkan hashtag
        $contactToBeRemove = BlockedContact::where('user_id', Auth::id())->where('hashtag', $hashtag)->first();

        // Menghapus kontak terkait
        $contactToBeRemove->delete();

        // Menjalankan function refresh
        $this->refresh();
    }
}
