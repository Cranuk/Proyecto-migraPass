<div class="header">
    <div>Empresas</div>

    <div wire:click.prevent="openModal" class="button add">Añadir empresa</div>

    @if($open)
    <!-- Fondo oscuro (click para cerrar) -->
    <div class="modal-overlay" wire:click="closeModal"></div>

    <!-- Contenedor del modal -->
    <div class="modal">
        <div class="form-style">
            <h3>Añadir nueva empresa</h3>
            <label for="company" class="label-text">Nombre de la empresa</label>
            <input type="text" class="form-input-style" wire:model="name" placeholder="Hotel Sheratons">
            <div class="modal-buttons">
                <button wire:click="closeModal" class="button cancel">Cerrar</button>
                <button wire:click="saveCompany" class="button add">Guardar</button>
            </div>
        </div>
    </div>
    @endif
</div>
