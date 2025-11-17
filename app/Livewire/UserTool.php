<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class UserTool extends Component
{
    public $userSelected;

    // evento que proviene de ListCompany.php
    #[On('hideTools')]
    public function hideTools(){
        $this->userSelected = false;
    }

    // evento que proviene de ListUser.php
    #[On('showTools')]
    public function showTools($id = null)
    {
        if(!$id) return;
        $this->userSelected = User::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.user-tool');
    }
}
