<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Traits\HasNotifications;

class ListCompany extends Component
{
    use HasNotifications;
    // NOTE: las variables que son publicas automaticamente son llamadas por livewire para poder ser usadas en la vista del componente
    public $hasCompanies;
    public $selectedCompany;
    public $confirmingDeletion = null;

    // evento que proviene de FormCompany.php
    #[On('refreshCompanies')]
    public function refreshCompanies()
    {}

    #[On('savedCompany')]
    public function savedCompany($message){
        $this->notify($message);
    }

    #[On('editedCompany')]
    public function editedCOmpany($message){
        $this->notify($message);
    }

    // evento que proviene de AddUser.php
    #[On('countUsers')]
    public function countUsers()
    {}

    public function selectCompany($companyId)
    {
        $this->selectedCompany = $companyId;
        $this->dispatch('loadUsers', id:$companyId)->to(ListUser::class); // llamamos el evento para actualizar la lista de usuarios
        $this->dispatch('loadApp', id:null)->to(ListApp::class); // llamamos el evento para limpiar la lista de aplicaciones
    }

    public function confirmDelete($id)
    {
        if ($this->confirmingDeletion !== $id) {
            $this->confirmingDeletion = $id;
            return;
        }

        sleep(1);

        $company = Company::find($id);

        if ($company) {
            if ($company->users()->exists()) {
                $this->notify("❌ Esta empresa tiene usuarios registrados.");
                $this->confirmingDeletion = null;
                return;
            }
            $company->delete();
            
            $this->confirmingDeletion = null;
            
            if ($this->selectedCompany === $id) {
                $this->notify("✅ Empresa eliminada correctamente.");
                $this->selectedCompany = null;
                $this->dispatch('loadUsers', id: null)->to(ListUser::class);
            }
        }
    }

    public function editCompany($id)
    {
        $this->dispatch('editCompany', id: $id)->to(FormCompany::class);
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
