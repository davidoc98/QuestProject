<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileComponent extends Component
{
    public $user, $name;

    public function render()
    {
        $this->user = Auth::user();
        return view('livewire.profile.component');
    }

    public function store()
    {
        $this->user = Auth::user();
        return view('livewire.profile.component');
    }
}
