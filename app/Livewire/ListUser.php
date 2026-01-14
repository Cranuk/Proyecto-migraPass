<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

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
        if (blank($id)) {
            $this->reset();
            return;
        }

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
        $this->dispatch('loadApp', id:$userId)->to(ListApp::class); // llamamos el evento para actualizar la lista de aplicaciones
    }

    public function confirmDelete($userId)
    {
        if ($this->confirmingDeletion !== $userId) {
            $this->confirmingDeletion = $userId;
            return;
        }

        sleep(2);

        $user = User::find($userId);
        
        if ($user) {
            if ($user->aplications()->exists()) {
                $this->info = "❌ Este usuario tiene aplicaciones registradas.";
                $this->confirmingDeletion = null;
                return; 
            }
            $user->delete();
            
            $this->confirmingDeletion = null;
            $this->info = "✅ Usuario eliminado correctamente.";

            $this->selectedUser = null; 
            $this->dispatch('loadApp', id: null);
            $this->dispatch('countUsers')->to(ListCompany::class);

            $this->refreshUsers(); 
        }
    }

    public function render()
    {
        return view('livewire.list-user');
    }
}
