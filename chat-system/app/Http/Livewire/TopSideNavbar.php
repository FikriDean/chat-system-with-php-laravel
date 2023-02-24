<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TopSideNavbar extends Component
{
    protected $listeners = ['refreshUserTarget' => 'refresh'];

    public $room;
    public $user;
    public $roomName;
    public $changeAlert;

    public function mount()
    {
        $this->user = Auth::user();

        if (Auth::user()->window_active != 'none') {
            $this->room = Room::where('room_code', Auth::user()->window_active)->first();
            if ($this->room) {
                $this->roomName = $this->room->room_name;
            }
        } else {
            $this->room = null;
        }
    }

    public function render()
    {
        return view('livewire.top-side-navbar');
    }

    public function refresh($room_code)
    {
        if ($room_code == 'none') {
            $this->room = null;
        }

        if (Auth::user()->window_active != 'none' && $room_code != 'none') {
            $this->room = Room::where('room_code', $room_code)->first();
            $this->roomName = $this->room->room_name;
        }
    }

    public function closeChat()
    {
        User::where('id', $this->user->id)->update([
            'window_active' => 'none'
        ]);

        $this->refresh('none');
        $this->emit('closeChatMessageInput');
        $this->emit('closeChatMessage');
    }

    public function saveRoomName($type)
    {
        if ($type == 'group') {
            if (strlen($this->roomName) >= 6 && strlen($this->roomName) <= 50) {
                if ($this->room->room_name == $this->roomName) {
                    $this->changeAlert = 'Try different name for your group';
                } else {
                    Room::where('room_code', $this->room->room_code)->update([
                        'room_name' => $this->roomName
                    ]);

                    $this->changeAlert = 'Name change was successful';
                }
            } else {
                $this->changeAlert = 'Name is too short(min:6) or too long(min:50)';
                return;
            }
        } elseif ($type == 'contact') {
        } else {
            $this->changeAlert = 'Name change was not successful';
            return;
        }
    }

    public function deleteGroup()
    {
        Room::where('room_code', $this->room->room_code)->delete();
        $this->closeChat();
        $this->emit('refreshChatList');
    }
}
