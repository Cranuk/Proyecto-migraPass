<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Traits\HasNotifications;

class FormUser extends Component
{
    use HasNotifications;
    public $open = false;
    public $companies;
    public $name;
    public $surname;
    public $sector;
    public $companyId;
    public $editingId = null;

    #[On('editUser')]
    public function editUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $this->editingId = $id;
            $this->name = $user->name;
            $this->surname = $user->surname;
            $this->sector = $user->sector;
            $this->companyId = $user->company_id;
            $this->open = true;
        }
    }

    public function saveUser(){
        $this->validate([
            'name' => 'required|string|min:3|max:255',
            'surname' => 'required|string|min:3|max:255',
            'sector' => 'required|string|min:3|max:255',
            'companyId' => 'required|exists:companies,id',
        ]);

        sleep(5);

        if ($this->editingId) {
            $user = User::find($this->editingId);
            $user->update([
                'name' => $this->name,
                'surname' => $this->surname,
                'sector' => $this->sector,
                'company_id' => $this->companyId,
            ]);
            $this->dispatch('editedUser', message: '✅ Usuario editado correctamente')->to(ListUser::class);
        } else {
            User::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'sector' => $this->sector,
                'company_id' => $this->companyId,
            ]);
            $this->dispatch('savedUser', message: '✅ Usuario creado correctamente')->to(ListUser::class);
        }

        $this->dispatch('updatedlist', companyId: $this->companyId)->to(ListUser::class); // actualizamos la lista si agregamos o editamos un usuario
        $this->dispatch('countUsers')->to(ListCompany::class); // cuenta los usuarios totales de cada empresa
        $this->reset(['open', 'name', 'surname', 'sector', 'companyId']);
    }

    public function openModal()
    {
        $this->open = true;
    }

    public function closeModal()
    {
        sleep(5);
        $this->reset(['name', 'surname', 'sector', 'companyId']);
        $this->resetErrorBag();
        $this->open = false;
    }

    public function render()
    { 
        $this->companies = Company::all();
        return view('livewire.form-user');
    }
}
