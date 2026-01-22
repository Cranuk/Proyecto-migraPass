<div class="header">
    <div>Aplicaciones</div>

    @include('includes.buttons.button-add-app')

    @if($open)
    <!-- Fondo oscuro (click para cerrar) -->
    <div class="modal-overlay" wire:click="closeModal"></div>

    <!-- Contenedor del modal -->
    <div class="modal">
        <div wire:loading wire:target="saveApp, closeModal" class="absolute form-loading">
            <div class="form-spinner">
                <svg width="64" height="64" fill="hsl(0, 0%, 100%)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="4" width="6" height="14" opacity="1">
                        <animate id="spinner_aqiq" begin="0;spinner_xVBj.end-0.25s" attributeName="y" dur="0.75s" values="1;5" fill="freeze" />
                        <animate begin="0;spinner_xVBj.end-0.25s" attributeName="height" dur="0.75s" values="22;14" fill="freeze" />
                        <animate begin="0;spinner_xVBj.end-0.25s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze" />
                    </rect>
                    <rect x="9" y="4" width="6" height="14" opacity=".4">
                        <animate begin="spinner_aqiq.begin+0.15s" attributeName="y" dur="0.75s" values="1;5" fill="freeze" />
                        <animate begin="spinner_aqiq.begin+0.15s" attributeName="height" dur="0.75s" values="22;14" fill="freeze" />
                        <animate begin="spinner_aqiq.begin+0.15s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze" />
                    </rect>
                    <rect x="17" y="4" width="6" height="14" opacity=".3">
                        <animate id="spinner_xVBj" begin="spinner_aqiq.begin+0.3s" attributeName="y" dur="0.75s" values="1;5" fill="freeze" />
                        <animate begin="spinner_aqiq.begin+0.3s" attributeName="height" dur="0.75s" values="22;14" fill="freeze" />
                        <animate begin="spinner_aqiq.begin+0.3s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze" />
                    </rect>
                </svg>
            </div>
        </div>
        <form wire:submit.prevent="saveApp" class="form-style" wire:loading.class="form-inactive">
            <h3>{{ $editingId ? 'Editar aplicación' : 'Nueva aplicación' }}</h3>
            <h4><strong>ID Usuario destino:</strong> {{ $user_id ?? 'No seleccionado' }}</h4>

            <label for="name" class="label-text">Nombre de la aplicacion:</label>
            <input type="text" class="form-input-style @error('name') error-border @enderror" wire:model="name" placeholder="X">

            @error('name')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <label for="user_aplication" class="label-text">nombre de usuario:</label>
            <input type="text" class="form-input-style @error('user_aplication') error-border @enderror" wire:model="user_aplication" placeholder="Xuser">

            @error('user_aplication')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <label for="password_aplication" class="label-text">Contraseña:</label>
            <input type="password" class="form-input-style @error('password_aplication') error-border @enderror" wire:model="password_aplication" placeholder="Xpass">

            @error('password_aplication')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <label for="url_application" class="label-text">URL:</label>
            <input type="text" class="form-input-style @error('url_application') error-border @enderror" wire:model="url_application" placeholder="https://example.com">

            @error('url_application')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <label for="notes" class="label-text">Notas:</label>
            <textarea class="form-input-style @error('notes') error-border @enderror" wire:model="notes" placeholder="Notas"></textarea>

            @error('notes')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <div class="modal-buttons">
                <button type="button" class="button cancel" wire:click="closeModal">
                    Cancelar
                </button>

                <button type="submit" class="button add">
                    {{ $editingId ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </form>
    </div>
    @endif
</div>
