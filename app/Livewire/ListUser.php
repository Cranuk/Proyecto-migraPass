<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ListUser extends Component
{
    public $companyId;
    public $hasUsers;
    public $users;
    public $selectedUser;

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

    public function selectUser($userId)
    {
        $this->selectedUser = $userId;
        $this->dispatch('showTools', id:$userId)->to(UserTool::class); // llamamos el evento para mostrar los botones para agregar dispositivos, aplicaciones y el nombre del usuario
        $this->dispatch('loadDevice', id:$userId)->to(ListDevice::class); // llamamos el evento para actualizar la lista de dispositivos
        $this->dispatch('loadApp', id:$userId)->to(ListApp::class); // llamamos el evento para actualizar la lista de aplicaciones
    }

    public function render()
    {
        return view('livewire.list-user');
    }
}
