<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class CreateNewContact extends Component
{
    public $user;
    public $username;
    public $hashtag;

    public $roomHasBeenCreated = false;
    public $accountInvalid = false;
    public $newRoomCreated = false;

    public $allContact = [];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->roomHasBeenCreated = false;
        $this->accountInvalid = false;
        $this->newRoomCreated = false;
    }

    protected $rules = [
        'username' => 'required|min:6|max:50',
        'hashtag' => 'required|min:3|max:50'
    ];

    public function render()
    {
        return view('livewire.create-new-contact');
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
            'room_code' => $this->getRoomCode(),
            'room_name' => $accountValid->name
        ]);

        User::where('id', auth::id())->first()->rooms()->attach($newRoom['id']);
        User::where('username', $this->username)->where('hashtag', $this->hashtag)->first()->rooms()->attach($newRoom['id']);

        $this->newRoomCreated = true;

        $this->emit('refreshContact');
    }
}
