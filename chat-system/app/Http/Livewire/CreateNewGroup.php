<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CreateNewGroup extends Component
{
    public $user;
    // public $allContacts = [];
    public $selectedContacts = [];

    public $search;
    protected $queryString = ['search'];

    protected $listeners = ['refreshContact' => 'refresh'];

    public function mount($user)
    {
        $this->user = $user;
        // $allRoomAuth = $this->user->rooms;
        // foreach ($allRoomAuth as $roomAuth) {
        //     if ($roomAuth->users->count() == 2) {
        //         foreach ($roomAuth->users as $roomAuthUser) {
        //             if ($roomAuthUser->id != Auth::id()) {
        //                 array_push($this->allContacts, $roomAuthUser);
        //             }
        //         }
        //     }
        // }

        // $this->allContacts = User::where('id', '!=', $this->user->id)->where('name', 'like', '%' . $this->search . '%')->get();
    }

    public function render()
    {
        return view('livewire.create-new-group', [
            'allContacts' => User::where('id', '!=', $this->user->id)->where('name', 'like', '%' . $this->search . '%')->get(),
        ]);
    }

    public function refresh()
    {
        // $this->allContacts = [];

        // $allRoomAuth = $this->user->rooms;
        // foreach ($allRoomAuth as $roomAuth) {
        //     if ($roomAuth->users->count() == 2) {
        //         foreach ($roomAuth->users as $roomAuthUser) {
        //             if ($roomAuthUser->id != Auth::id()) {
        //                 array_push($this->allContacts, $roomAuthUser);
        //             }
        //         }
        //     }
        // }
    }
}
