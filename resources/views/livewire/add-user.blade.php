<div class="header">
    <div>Usuarios</div>

    @include('includes.buttons.button-add-user')

    @if($open)
    <!-- Fondo oscuro (click para cerrar) -->
    <div class="modal-overlay" wire:click="closeModal"></div>

    <!-- Contenedor del modal -->
    <div class="modal">
        <div wire:loading wire:target="saveUser, closeModal" class="absolute form-loading">
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
        <form wire:submit.prevent="saveUser" wire:loading.class="form-inactive" class="form-style">
            <h3>Añadir nuevo usuario</h3>
            <label for="name" class="label-text">Nombre:</label>
            <input type="text" class="form-input-style @error('name') error-border @enderror" wire:model="name" placeholder="Javier">

            @error('name')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <label for="surname" class="label-text">Apellido</label>
            <input type="text" class="form-input-style @error('surname') error-border @enderror" wire:model="surname" placeholder="Saucedo">

            @error('surname')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <label for="sector" class="label-text">Departamento/Sector</label>
            <input type="text" class="form-input-style @error('sector') error-border @enderror" wire:model="sector" placeholder="Ventas">

            @error('sector')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <label for="company" class="label-text">Empresa</label>
            <select class="form-input-style @error('companyId') error-border @enderror" wire:model="companyId">
                <option value="">Seleccionar empresa</option>
                @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>

            @error('companyId')
            <span class="error-text">{{ $message }}</span>
            @enderror

            <div class="modal-buttons">
                <button type="button" class="button cancel" wire:click="closeModal">
                    Cancelar
                </button>

                <button type="submit" class="button add">
                    Crear
                </button>
            </div>
        </form>
    </div>
    @endif
</div>
