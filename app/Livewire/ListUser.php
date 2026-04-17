<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Traits\HasNotifications;

class ListUser extends Component
{
    use HasNotifications;
    public $companyId;
    public $hasUsers;
    public $users;
    public $selectedUser;
    public $confirmingDeletion = null;

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

    // evento que proviene de formUser.php
    #[On('updatedlist')]
    public function updatedlist($companyId = null)
    {
        if(!$companyId) return;
        $this->refreshUsers();
        $this->selectedUser = null;
        $this->dispatch('loadApp', id:null)->to(ListApp::class);
    }

    #[On('savedUser')]
    public function savedUser($message){
        $this->notify($message);
    }

    #[On('editedUser')]
    public function editedUser($message){
        $this->notify($message);
    }

    // evento que proviene de listApp.php
    #[On('askForSelectedUser')]
    public function askForSelectedUser()
    {
        if ($this->selectedUser) {
            $this->dispatch('setUserId', id: $this->selectedUser)->to(FormApp::class);
        }
    }

    private function refreshUsers()
    {
        $this->users = User::where('company_id', $this->companyId)->get();
        $this->hasUsers = $this->users->isNotEmpty();
    }

    public function selectUser($id)
    {
        $this->selectedUser = $id;
        $this->dispatch('loadApp', id:$id)->to(ListApp::class); // llamamos el evento para actualizar la lista de aplicaciones
        $this->dispatch('setUserId', id:$id); // enviamos el id del usuarioal formulario de aplicaciones
    }

    public function confirmDelete($id)
    {
        if ($this->confirmingDeletion !== $id) {
            $this->confirmingDeletion = $id;
            return;
        }

        sleep(5);

        $user = User::find($id);
        
        if ($user) {
            if ($user->aplications()->exists()) {
                $this->notify("❌ Este usuario tiene aplicaciones registradas.");
                $this->confirmingDeletion = null;
                return; 
            }
            $user->delete();
            
            $this->confirmingDeletion = null;
            $this->notify("✅ Usuario eliminado correctamente.");

            $this->selectedUser = null; 
            $this->dispatch('loadApp', id: null);
            $this->dispatch('countUsers')->to(ListCompany::class);

            $this->refreshUsers(); 
        }
    }

    public function editUser($id)
    {
        $this->dispatch('editUser', id: $id)->to(FormUser::class);
    }

    public function render()
    {
        return view('livewire.list-user');
    }
}
