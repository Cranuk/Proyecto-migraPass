<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Attributes\On;
use Livewire\Component;

class ListCompany extends Component
{
    public $hasCompanies = false;
    public $selectedCompany = null;

    public function mount()
    {
        $this->selectedCompany = null;
    }

    // evento que proviene de AddCompany.php
    #[On('companyAdded')]
    public function companyAdded()
    {}

    // evento que proviene de AddUser.php
    #[On('countUsers')]
    public function countUsers()
    {}

    public function selectCompany($companyId)
    {
        $this->selectedCompany = $companyId;
        $this->dispatch('loadUsers', id:$companyId)->to(ListUser::class); // llamamos el evento para actualizar la lista de usuarios
    }

    public function render()
    {
        $allCompanies = Company::withCount('users')->get();
        $this->hasCompanies = $allCompanies->isNotEmpty();
        return view('livewire.list-company', [
            'companies' => $allCompanies,
            'hasCompanies' => $this->hasCompanies,
            'selectedCompany' => $this->selectedCompany,
        ]);
    }
}
