<?php

namespace App\Livewire;

use App\Models\Aplication;
use Livewire\Attributes\On;
use Livewire\Component;

class FormApp extends Component
{
    public $open = false;
    public $editingId = null;
    public $user_id;
    public $name;
    public $user_aplication;
    public $password_aplication;
    public $url_application;
    public $notes;

    #[On('setUserId')]
    public function setUserId($id)
    {
        $this->user_id = $id;
        $this->editingId = null;
    }

    #[On('editApp')]
    public function editApp($id)
    {
        $app = Aplication::find($id);
        if ($app) {
            $this->editingId = $id;
            $this->user_id = $app->user_id;
            $this->name = $app->name;
            $this->user_aplication = $app->user_aplication;
            $this->password_aplication = $app->password_aplication;
            $this->url_application = $app->url_application;
            $this->notes = $app->notes;
            $this->open = true;
        }
    }

    public function saveApp(){
        $this->validate([
            'name' => 'required|string|min:3|max:255',
            'user_aplication' => 'required|string|min:3|max:255',
            'password_aplication' => 'required|string|min:3|max:255',
            'url_application' => 'required|string|min:3|max:255',
            'notes' => 'nullable|string',
        ]);

        sleep(2);

        if ($this->editingId) {
            $app = Aplication::find($this->editingId);
            $app->update([
                'name' => $this->name,
                'user_aplication' => $this->user_aplication,
                'password_aplication' => $this->password_aplication,
                'url_application' => $this->url_application,
                'notes' => $this->notes,
            ]);
        } else {
            Aplication::create([
                'user_id' => $this->user_id,
                'name' => $this->name,
                'user_aplication' => $this->user_aplication,
                'password_aplication' => $this->password_aplication,
                'url_application' => $this->url_application,
                'notes' => $this->notes,
            ]);
        }
        $this->reset(['open', 'name', 'user_aplication', 'password_aplication', 'url_application', 'notes']);
        $this->dispatch('loadApp', id: $this->user_id)->to(ListApp::class);
    }
    
    public function openModal()
    {
        $this->reset(['name', 'user_aplication', 'password_aplication', 'url_application', 'notes', 'editingId']);
        $this->dispatch('askForSelectedUser')->to(ListUser::class);
        $this->open = true;
    }

    public function closeModal()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.form-app');
    }
}
