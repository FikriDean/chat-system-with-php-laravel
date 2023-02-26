<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\BlockedContact;

class RemoveBlocked extends Component
{
    public $authBlocked;

    protected $listeners = ['refreshBlockedContacts' => 'refresh'];

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

    public function unblock($hashtag)
    {
        $contactToBeRemove = BlockedContact::where('user_id', Auth::id())->where('hashtag', $hashtag)->first();
        $contactToBeRemove->delete();
        $this->refresh();
    }
}
