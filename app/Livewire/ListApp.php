<?php

namespace App\Livewire;

use App\Models\Aplication;
use Livewire\Attributes\On;
use Livewire\Component;

class ListApp extends Component
{
    public $userId;
    public $apps;
    public $hasApps;

    #[On('loadApp')]
    public function loadApp($id){
        $this->userId = $id;

        if (!$id) {
            $this->apps = collect();
            $this->hasApps = false;
            return;
        }

        $this->refreshApps();
    }

    private function refreshApps()
    {
        if (!$this->userId) {
            $this->apps = collect(); 
            $this->hasApps = false;
            return;
        }
        $this->apps = Aplication::where('user_id', $this->userId)->get();
        $this->hasApps = $this->apps->isNotEmpty();
    }

    public function render()
    {
        return view('livewire.list-app');
    }
}
