<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Attributes\On;
use Livewire\Component;

class ListDevice extends Component
{
    public $userId;
    public $devices;
    public $hasDevice;

    // evento que proviene de listUser.php
    #[On('loadDevice')]
    public function loadDevice($id){
        if(!$id) return;
        
        $this->refreshDevice();
    }

    private function refreshDevice()
    {
        $this->devices = Device::where('user_id', $this->userId)->get();
        $this->hasDevice = $this->device->isNotEmpty();
    }
    
    public function render()
    {
        return view('livewire.list-device');
    }
}
