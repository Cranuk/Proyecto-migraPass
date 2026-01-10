<?php

namespace App\Livewire;

use App\Models\Aplication;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class ListApp extends Component
{
    public $userSelected;
    public $userId;
    public $apps;
    public $hasApps = false;

    public function rendering()
    {
        $isExist = User::where('id', $this->userId)->exists();
        if ($this->userId && !$isExist) {
            $this->reset(['userId', 'userSelected', 'apps', 'hasApps']);
        }
    }

    #[On('loadApp')]
    public function loadApp($id){
        if (blank($id)) {
            $this->reset(['userId', 'apps', 'hasApps', 'userSelected']);
            return;
        }

        $this->userId = $id;
        $this->refreshApps();
    }

    private function refreshApps()
    {
        $user = User::find($this->userId);

        if (!$user) {
            $this->reset(['apps', 'hasApps', 'userSelected', 'userId']);
            return;
        }

        $this->userSelected = $user;
        $this->apps = Aplication::where('user_id', $this->userId)->get();
        $this->hasApps = $this->apps->isNotEmpty();
    }

    public function render()
    {
        return view('livewire.list-app');
    }
}
