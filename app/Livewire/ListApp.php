<?php

namespace App\Livewire;

use App\Models\Aplication;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Traits\HasNotifications;

class ListApp extends Component
{
    use HasNotifications;
    public $userId;
    public $apps;
    public $selectedApp;
    public $hasApps = false;
    public $confirmingDeletion = null;


    // evento que proviene de formApp.php
    #[On('savedApp')]
    public function savedApp($message){
        $this->notify($message);
    }

    #[On('editedApp')]
    public function editedApp($message){
        $this->notify($message);
    }

    #[On('loadApp')]
    public function loadApp($id){
        if (blank($id)) {
            $this->reset();
            return;
        }

        $this->userId = $id;
        $this->refreshApps();
    }

    public function selectApp($appId)
    {
        $this->selectedApp = $appId;
    }

    public function confirmDelete($id)
    {
        if ($this->confirmingDeletion !== $id) {
            $this->confirmingDeletion = $id;
            return;
        }

        sleep(1);

        $app = Aplication::find($id);

        if ($app) {
            $app->delete();
            $this->confirmingDeletion = null;
            if ($this->selectedApp === $id) {
                $this->notify("✅ Aplicacion eliminada correctamente.");
                $this->selectedApp = null;
                $this->refreshApps();
            }
        }
    }

    public function editApp($id)
    {
        $this->dispatch('editApp', id: $id)->to(FormApp::class);
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
