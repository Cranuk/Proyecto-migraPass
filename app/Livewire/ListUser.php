<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ListUser extends Component
{
    public $companyId;
    public $hasUsers = false;
    public $users;

    public function mount()
    {
        $this->companyId = null;
        $this->users;
    }

    // evento que proviene de listCompany.php
    #[On('loadUsers')]
    public function loadUsers($id = null)
    {
        if (!$id) return;

        $this->companyId = $id;
        $this->refreshUsers();
    }

    // evento que proviene de addUser.php
    #[On('userAdded')]
    public function userAdded($companyId = null)
    {
        if(!$companyId) return;
        if ($this->companyId == $companyId) {
            $this->refreshUsers();
        }
    }

    private function refreshUsers()
    {
        $this->users = User::where('company_id', $this->companyId)->get();
        $this->hasUsers = $this->users->isNotEmpty();
    }

    public function render()
    {
        return view('livewire.list-user', [
            'users' => $this->users,
            'hasUsers' => $this->hasUsers,
        ]);
    }
}
