<div class="header">
    <div>Usuarios</div>

    <div wire:click.prevent="openModal" class="button add">Añadir usuario</div>

    @if($open)
    <!-- Fondo oscuro (click para cerrar) -->
    <div class="modal-overlay" wire:click="closeModal"></div>

    <!-- Contenedor del modal -->
    <div class="modal">
        <div class="form-style">
            <h3>Añadir nuevo usuario</h3>
            <label for="name" class="label-text">Nombre</label>
            <input type="text" class="form-input-style" wire:model="name" placeholder="Javier">

            <label for="surname" class="label-text">Apellido</label>
            <input type="text" class="form-input-style" wire:model="surname" placeholder="Saucedo">

            <label for="sector" class="label-text">Departamento/Sector</label>
            <input type="text" class="form-input-style" wire:model="sector" placeholder="Ventas">

            <label for="company" class="label-text">Empresa</label>
            <select class="form-input-style" wire:model="companyId">
                <option value="">Seleccionar empresa</option>
                @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            <div class="modal-buttons">
                <button wire:click="closeModal" class="button cancel">Cerrar</button>
                <button wire:click="saveUser" class="button add">Guardar</button>
            </div>
        </div>
    </div>
    @endif
</div>
