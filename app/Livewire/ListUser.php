<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ListUser extends Component
{

    public $companyId; // NOTE: variable publica que recibe el id de la empresa seleccionada
    public $hasUsers = false;

    #[On('loadUsers')]
    public function loadUsers($id)
    {
        $this->companyId = $id;
    }

    public function render()
    {
        $users = User::where('company_id', $this->companyId)->get();
        $count = $users->count();
        $this->hasUsers = $users->isNotEmpty();

        return view('livewire.list-user', [
            'users' => $users,
            'count' => $count,
            'hasUsers' => $this->hasUsers,
        ]);
    }
}
