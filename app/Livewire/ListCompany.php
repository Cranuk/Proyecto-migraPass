<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Attributes\On;
use Livewire\Component;

class ListCompany extends Component
{
    public $companyAdded;
    public $hasCompanies = false;

    #[On('companyAdded')]
    public function companyAdded()
    {
        $this->companyAdded = Company::all();
    }

    public function selectCompany($companyId)
    {
        $this->dispatch('loadUsers', id:$companyId)->to(ListUser::class);
    }

    public function render()
    {
        $allCompanies = Company::all();
        $this->hasCompanies = $allCompanies->isNotEmpty();
        return view('livewire.list-company', [
            'companies' => $allCompanies,
            'hasCompanies' => $this->hasCompanies,
        ]);
    }
}
