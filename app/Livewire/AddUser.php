<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\User;
use Livewire\Component;

class AddUser extends Component
{

    public $open = false;
    public $companies;
    public $name;
    public $surname;
    public $sector;
    public $companyId;

    public function saveUser(){
        $this->validate([
            'name' => 'required|string|min:3|max:255',
            'surname' => 'required|string|min:3|max:255',
            'sector' => 'required|string|min:3|max:255',
            'companyId' => 'required|exists:companies,id',
        ]);

        sleep(1);

        User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'sector' => $this->sector,
            'company_id' => $this->companyId,
        ]);

        $this->dispatch('userAdded', companyId: $this->companyId)->to(ListUser::class); // actualizamos la lista si agregamos un usuario nuevo a la empresa seleccionada
        $this->dispatch('countUsers')->to(ListCompany::class); // cuenta los usuarios totales de cada empresa
        $this->reset(['open', 'name', 'surname', 'sector', 'companyId']);
    }

    public function openModal()
    {
        $this->open = true;
    }

    public function closeModal()
    {
        sleep(1);
        $this->reset(['name', 'surname', 'sector', 'companyId']);
        $this->resetErrorBag();
        $this->open = false;
    }

    public function render()
    { 
        $this->companies = Company::all();
        return view('livewire.add-user');
    }
}
