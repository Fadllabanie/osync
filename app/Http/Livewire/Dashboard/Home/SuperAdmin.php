<?php

namespace App\Http\Livewire\Dashboard\Home;

use App\Models\Card;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class SuperAdmin extends Component
{
    public $totalCards;
    public $totalUsers;
    public $totalPendingMessages;

    public function mount()
    {
        $this->totalCards = Card::count();
        $this->totalUsers = User::count();
        $this->totalPendingMessages = Message::pending()->count();
    }
    public function render()
    {
        return view('livewire.dashboard.home.super-admin');
    }
}
