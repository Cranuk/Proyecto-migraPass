<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Attributes\On;
use Livewire\Component;

class FormCompany extends Component
{
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

        sleep(2);

        if ($this->editingId) {
            $company = Company::find($this->editingId);
            $company->update(['name' => $this->name]);
        } else {
            Company::create(['name' => $this->name]);
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
        sleep(2);
        $this->reset(['name']);
        $this->resetErrorBag();
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.form-company');
    }
}
