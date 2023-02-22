<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ControlSideNavbar extends Component
{
    public $user;
    public $users;
    public $username;
    public $hashtag;
    public $roomHasBeenCreated = false;
    public $accountInvalid = false;
    public $newRoomCreated = false;
    public $allContact = [];

    protected $rules = [
        'username' => 'required|min:6|max:50',
        'hashtag' => 'required|min:3|max:50'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->roomHasBeenCreated = false;
        $this->accountInvalid = false;
        $this->newRoomCreated = false;
    }

    public function mount($user, $users)
    {
        $this->user = $user;
        $this->users = $users;

        $allRoomAuth = $this->user->rooms;
        foreach ($allRoomAuth as $roomAuth) {
            if ($roomAuth->users->count() == 2) {
                foreach ($roomAuth->users as $roomAuthUser) {
                    if ($roomAuthUser->id != Auth::id()) {
                        array_push($this->allContact, $roomAuthUser);
                    }
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.control-side-navbar');
    }

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

    public function addRoomPerson()
    {
        $accountValid = User::where('username', $this->username)->where('hashtag', $this->hashtag)->first();

        if (!$accountValid) {
            $this->accountInvalid = true;
            return;
        }

        $roomAlreadyExists = Room::whereHas('users', function ($query) {
            $query->where('username', $this->username)->where('hashtag', $this->hashtag);
        })->get();

        foreach ($roomAlreadyExists as $room) {
            if ($room->users->count() == 2) {
                foreach ($room->users as $roomUser) {
                    if ($roomUser->hashtag == Auth::user()->hashtag) {
                        $this->roomHasBeenCreated = true;
                        return;
                    }
                }
            }
        };

        $newRoom = Room::create([
            'room_code' => $this->getRoomCode()
        ]);

        User::where('id', auth::id())->first()->rooms()->attach($newRoom['id']);
        User::where('username', $this->username)->where('hashtag', $this->hashtag)->first()->rooms()->attach($newRoom['id']);

        $this->newRoomCreated = true;
    }
}
