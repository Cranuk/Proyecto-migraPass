<div class="header">
    <div>Usuarios</div>

    <div wire:click.prevent="openModal" class="button add" title="Agregar usuario">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
            <path d="M16 19h6" />
            <path d="M19 16v6" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
    </div>

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
