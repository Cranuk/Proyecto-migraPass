<div class="header">
    <div>Empresas</div>
    @include('includes.buttons.button-add-company')

    @if($open)
    <!-- Fondo oscuro (click para cerrar) -->
    <div class="modal-overlay" wire:click="closeModal"></div>

    <!-- Contenedor del modal -->
    @include('includes.modal.modal-add-company')
    @endif
</div>
