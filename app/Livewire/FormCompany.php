<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Traits\HasNotifications;

class FormCompany extends Component
{
    use HasNotifications;
    public $open = false;
    public $name = '';
    public $editingId = null;

    #[On('editCompany')]
    public function editCompany($id)
    {
        $company = Company::find($id);
        if ($company) {
            $this->editingId = $id;
            $this->name = $company->name;
            $this->open = true;
        }
    }

    public function saveCompany(){
        $this->validate([
            'name' => 'required|string|min:3|max:255|unique:companies,name',
        ]);

        sleep(5);

        if ($this->editingId) {
            $company = Company::find($this->editingId);
            $company->update(['name' => $this->name]);
            $this->dispatch('editedCompany', message: '✅ Empresa editada correctamente')->to(ListCompany::class);
        } else {
            Company::create(['name' => $this->name]);
            $this->dispatch('savedCompany', message: '✅ Empresa guardada correctamente')->to(ListCompany::class);
        }
        $this->dispatch('refreshCompanies')->to(ListCompany::class); // actualizo la lista de empresas
        $this->reset(['open', 'name', 'editingId']);
    }

    public function openModal()
    {
        $this->open = true;
    }

    public function closeModal()
    {
        sleep(5);
        $this->reset(['name']);
        $this->resetErrorBag();
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.form-company');
    }
}
