<div>
    <div wire:click.prevent="openModal" class="button add" title="Agregar dispositivo">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-devices-plus">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M13 16.5v-7.5a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3.5" />
            <path d="M18 8v-3a1 1 0 0 0 -1 -1h-13a1 1 0 0 0 -1 1v12a1 1 0 0 0 1 1h8" />
            <path d="M16 9h2" />
            <path d="M16 19h6" />
            <path d="M19 16v6" />
        </svg>
    </div>

    @if($open)
    <!-- Fondo oscuro (click para cerrar) -->
    <div class="modal-overlay" wire:click="closeModal"></div>

    <!-- Contenedor del modal -->
    <div class="modal">
        <div class="form-style">
            <h3>Añadir nuevo dispositivo</h3>
            <label for="company" class="label-text">Nombre del dispositivo</label>
            <input type="text" class="form-input-style" wire:model="name" placeholder="Hotel Sheratons">
            <div class="modal-buttons">
                <button wire:click="closeModal" class="button cancel">Cerrar</button>
                <button wire:click="saveCompany" class="button add">Guardar</button>
            </div>
        </div>
    </div>
    @endif
</div>
