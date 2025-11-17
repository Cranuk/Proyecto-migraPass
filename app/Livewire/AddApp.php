<?php

namespace App\Livewire;

use Livewire\Component;

class AddApp extends Component
{
    public $open = false;
    
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
        return view('livewire.add-app');
    }
}
