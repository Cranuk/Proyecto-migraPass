<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class AddCompany extends Component
{
    public $open = false;
    public $name = '';

    public function mount()
    {
        $this->open = false;
    }

    public function saveCompany(){
        $this->validate([
            'name' => 'required|string|min:3|max:255',
        ]);

        Company::create([
            'name' => $this->name
        ]);

        $this->dispatch('companyAdded')->to(ListCompany::class); // actualizo la lista de empresas

        $this->reset(['open', 'name']);
    }

    public function openModal()
    {
        $this->open = true;
    }

    public function closeModal()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.add-company');
    }
}
