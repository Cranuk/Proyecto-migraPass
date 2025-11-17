<div class="header">
    <div>Empresas</div>

    <div wire:click.prevent="openModal" class="button add" title="Agregar empresa">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-building-plus">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 21h9" />
            <path d="M9 8h1" />
            <path d="M9 12h1" />
            <path d="M9 16h1" />
            <path d="M14 8h1" />
            <path d="M14 12h1" />
            <path d="M5 21v-16c0 -.53 .211 -1.039 .586 -1.414c.375 -.375 .884 -.586 1.414 -.586h10c.53 0 1.039 .211 1.414 .586c.375 .375 .586 .884 .586 1.414v7" />
            <path d="M16 19h6" />
            <path d="M19 16v6" /></svg>
    </div>

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
