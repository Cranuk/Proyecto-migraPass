<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Attributes\On;
use Livewire\Component;

class ListCompany extends Component
{
    // NOTE: las variables que son publicas automaticamente son llamadas por livewire para poder ser usadas en la vista del componente
    public $hasCompanies;
    public $selectedCompany;
    public $confirmingDeletion = null;
    public $info = '';

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
        $this->dispatch('hideTools')->to(UserTool::class); // llamamos a este evento para ocultar las herramientas para agregar dispositivos y aplicaciones hasta que seleccione un usuario nuevamente
    }

    public function confirmDelete($id)
    {
        if ($this->confirmingDeletion !== $id) {
            $this->confirmingDeletion = $id;
            return;
        }

        sleep(2);

        $company = Company::find($id);

        if ($company) {
            if ($company->users()->count() > 0) {
                        $this->info = "❌ Esta empresa tiene usuarios.";
                        $this->confirmingDeletion = null;
                        return; 
            }
            $company->delete();
            
            $this->confirmingDeletion = null;
            
            if ($this->selectedCompany === $id) {
                $this->info = "✅ Empresa eliminada correctamente.";
                $this->selectedCompany = null;
                $this->dispatch('loadUsers', id: null)->to(ListUser::class);
            }
        }
    }

    public function render()
    {
        $allCompanies = Company::withCount('users')->get(); // NOTE: esta variable como se declaro en render se debe enviar a la vista para ser usada
        $this->hasCompanies = $allCompanies->isNotEmpty();
        return view('livewire.list-company', [
            'companies' => $allCompanies
        ]);
    }
}
