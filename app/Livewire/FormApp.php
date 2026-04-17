<?php

namespace App\Livewire;

use App\Models\Aplication;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Traits\HasNotifications;

class FormApp extends Component
{
    use HasNotifications;
    public $open = false;
    public $editingId = null;
    public $cardAppOpen = null;
    public $user_id;
    public $name;
    public $user_aplication;
    public $password_aplication;
    public $url_aplication;
    public $notes;
    public $showPassword = false;

    #[On('setUserId')]
    public function setUserId($id)
    {
        $this->user_id = $id;
        $this->editingId = null;
    }

    #[On('editApp')]
    public function editApp($id)
    {
        $this->loadAppData($id);
        $this->cardAppOpen = false;
    }

    #[On('detailsApp')]
    public function detailsApp($id)
    {
        $this->loadAppData($id);
        $this->cardAppOpen = true;
    }

    public function toggleShowPassword()
    {
        $this->showPassword = !$this->showPassword;
    }

    private function loadAppData($id)
    {
        $app = Aplication::find($id);
        if ($app) {
            $this->editingId = $id;
            $this->user_id = $app->user_id;
            $this->name = $app->name;
            $this->user_aplication = $app->user_aplication;
            $this->password_aplication = $app->password_aplication;
            $this->url_aplication = $app->url_aplication;
            $this->notes = $app->notes;
            $this->open = true;
        }
    }

    public function saveApp(){
        $this->validate([
            'name' => 'required|string|min:3|max:255',
            'user_aplication' => 'required|string|min:3|max:255',
            'password_aplication' => 'required|string|min:3|max:255',
            'url_aplication' => 'required|string|min:3|max:255',
            'notes' => 'nullable|string',
        ]);

        sleep(5);

        if ($this->editingId) {
            $app = Aplication::find($this->editingId);
            $app->update([
                'name' => $this->name,
                'user_aplication' => $this->user_aplication,
                'password_aplication' => $this->password_aplication,
                'url_aplication' => $this->url_aplication,
                'notes' => $this->notes,
            ]);
            $this->dispatch('editedApp', message: '✅ Aplicacion editada correctamente')->to(ListApp::class);
        } else {
            Aplication::create([
                'user_id' => $this->user_id,
                'name' => $this->name,
                'user_aplication' => $this->user_aplication,
                'password_aplication' => $this->password_aplication,
                'url_aplication' => $this->url_aplication,
                'notes' => $this->notes,
            ]);
            $this->dispatch('savedApp', message: '✅ Aplicacion creada correctamente')->to(ListApp::class);
        }
        $this->reset(['open', 'name', 'user_aplication', 'password_aplication', 'url_aplication', 'notes']);
        $this->dispatch('loadApp', id: $this->user_id)->to(ListApp::class);
    }
    
    public function openModal()
    {
        $this->reset(['name', 'user_aplication', 'password_aplication', 'url_aplication', 'notes', 'editingId']);
        $this->dispatch('askForSelectedUser')->to(ListUser::class);
        $this->open = true;
    }

    public function closeModal()
    {
        $this->open = false;
        $this->cardAppOpen = false;
    }

    public function render()
    {
        return view('livewire.form-app');
    }
}
