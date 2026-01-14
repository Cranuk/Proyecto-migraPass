<?php

namespace App\Livewire;

use App\Models\Aplication;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ListApp extends Component
{
    public $userId;
    public $apps;
    public $hasApps = false;

    #[On('loadApp')]
    public function loadApp($id){
        if (blank($id)) {
            $this->reset();
            return;
        }

        $this->userId = $id;
        $this->refreshApps();
    }

    private function refreshApps()
    {
        $this->apps = Aplication::where('user_id', $this->userId)->get();
        $this->hasApps = $this->apps->isNotEmpty();
    }

    public function render()
    {
        return view('livewire.list-app');
    }
}
