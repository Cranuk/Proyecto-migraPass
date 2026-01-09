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
    public $confirmingDeletion = null;
    public $info = '';

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

    public function confirmDelete($id)
    {
        if ($this->confirmingDeletion !== $id) {
            $this->confirmingDeletion = $id;
            return;
        }

        $user = User::find($id);

        if ($user) {
            // Validación de seguridad
            if ($user->aplications()->exists()) {
                $this->info = "❌ Este usuario tiene aplicaciones registradas.";
                $this->confirmingDeletion = null;
                return; 
            }

            if ($this->selectedUser === $id) {
                $this->selectedUser = null;
                $this->dispatch('showTools', id: null)->to(UserTool::class);
                $this->dispatch('loadApp', id: null)->to(ListApp::class);
            }

            $user->delete();
            
            $this->confirmingDeletion = null;
            $this->info = "✅ Usuario eliminado correctamente.";
            
            // Refrescamos la lista de usuarios actual
            $this->refreshUsers(); 
        }
    }

    public function selectUser($userId)
    {
        $this->selectedUser = $userId;
        $this->dispatch('showTools', id:$userId)->to(UserTool::class); // llamamos el evento para mostrar los botones para agregar dispositivos, aplicaciones y el nombre del usuario
        $this->dispatch('loadApp', id:$userId)->to(ListApp::class); // llamamos el evento para actualizar la lista de aplicaciones
    }

    public function render()
    {
        return view('livewire.list-user');
    }
}
