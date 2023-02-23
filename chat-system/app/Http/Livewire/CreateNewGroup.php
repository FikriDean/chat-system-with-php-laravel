<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;

class CreateNewGroup extends Component
{
    public $user;
    public $selectedContacts = [];
    public $groupName;
    public $search;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's']
    ];

    protected $listeners = ['refreshContact' => 'refresh'];

    protected $rules = [
        'groupName' => 'required|min:6|max:50',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.create-new-group', [
            'allContacts' => User::where('id', '!=', $this->user->id)->where('name', 'like', '%' . $this->search . '%')->get(),
        ]);
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

    public function addRoomGroup()
    {
        $this->validate();

        if (count($this->selectedContacts) < 2) {
            session()->flash('emptySelected', 'You must to choose at least 2 contact to make a group with.');
            return;
        }

        $newRoom = Room::create([
            'room_code' => $this->getRoomCode(),
            'room_name' => $this->groupName
        ]);

        User::where('id', auth::id())->first()->rooms()->attach($newRoom['id']);

        foreach ($this->selectedContacts as $userContactId) {
            User::where('id', $userContactId)->first()->rooms()->attach($newRoom['id']);
        }

        $this->emit('refreshContact');
    }

    public function refresh()
    {
        $this->selectedContacts = [];
        $this->groupName = [];

        session()->flash('roomCreated', 'Group created succesfully.');
    }
}
