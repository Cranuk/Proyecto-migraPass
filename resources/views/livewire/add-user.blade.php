<div class="header">
    <div>Usuarios</div>

    @include('includes.buttons.button-add-user')

    @if($open)
    <!-- Fondo oscuro (click para cerrar) -->
    <div class="modal-overlay" wire:click="closeModal"></div>

    <!-- Contenedor del modal -->
    @include('includes.modal.modal-add-user')
    @endif
</div>
