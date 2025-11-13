<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class AddUser extends Component
{

    public $open = false;
    public $companies;
    public $name = '';
    public $surname = '';
    public $sector = '';
    public $companyId = '';

    public function mount()
    {
        $this->companies = Company::all();
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
        return view('livewire.add-user');
    }
}
