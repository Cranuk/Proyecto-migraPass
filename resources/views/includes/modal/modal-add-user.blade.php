<div class="modal">
    <form wire:submit="saveUser" class="form-style">
        <h3>Añadir nuevo usuario</h3>
        <label for="name" class="label-text">Nombre:</label>
        <input type="text" class="form-input-style @error('name') error-border @enderror" wire:model="name" wire:loading.attr="disabled" wire:target="saveUser" placeholder="Javier">

        @error('name')
        <span class="error-text" style="color: var(--red); font-size: 10px;">{{ $message }}</span>
        @enderror

        <label for="surname" class="label-text">Apellido</label>
        <input type="text" class="form-input-style @error('surname') error-border @enderror" wire:model="surname" wire:loading.attr="disabled" wire:target="saveUser" placeholder="Saucedo">

        @error('surname')
        <span class="error-text" style="color: var(--red); font-size: 10px;">{{ $message }}</span>
        @enderror

        <label for="sector" class="label-text">Departamento/Sector</label>
        <input type="text" class="form-input-style @error('sector') error-border @enderror" wire:model="sector" wire:loading.attr="disabled" wire:target="saveUser" placeholder="Ventas">

        @error('sector')
        <span class="error-text" style="color: var(--red); font-size: 10px;">{{ $message }}</span>
        @enderror

        <label for="company" class="label-text">Empresa</label>
        <select class="form-input-style @error('companyId') error-border @enderror" wire:model="companyId" wire:loading.attr="disabled" wire:target="saveUser">
            <option value="">Seleccionar empresa</option>
            @foreach($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>

        @error('companyId')
        <span class="error-text" style="color: var(--red); font-size: 10px;">{{ $message }}</span>
        @enderror

        <div class="modal-buttons">
            <button type="button" class="button cancel" wire:click="closeModal" wire:loading.remove wire:target="saveUser">
                Cancelar
            </button>

            <button type="submit" class="button add" wire:loading.attr="disabled" wire:target="saveUser">
                <span wire:loading.remove wire:target="saveUser">Crear</span>
                <span wire:loading wire:target="saveUser">
                    <svg width="14" height="14" fill="hsl(0, 0%, 100%)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                </span>
            </button>
        </div>
    </form>
</div>
