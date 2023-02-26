<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\BlockedContact;

class RemoveBlocked extends Component
{
    // Menambahkan $listeners agar bisa di-emit dari livewire lain
    protected $listeners = ['refreshBlockedContacts' => 'refresh'];

    // Variable kontak yang di blokir user yang login
    public $authBlocked;

    public function mount()
    {
        $this->authBlocked = Auth::user()->blockedContacts;
    }

    public function render()
    {
        return view('livewire.remove-blocked');
    }

    public function refresh()
    {
        $this->authBlocked = Auth::user()->blockedContacts;
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
