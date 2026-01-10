<button type="button" wire:click.stop="confirmDelete({{ $companyId }})" wire:loading.attr="disabled" wire:target="confirmDelete" class="button cancel small {{ $confirmingDeletion === $companyId ? 'delete' : '' }}" title="Eliminar">

    <span wire:loading.remove wire:target="confirmDelete">
        @if($confirmingDeletion === $companyId)
        <span style="font-weight: bold; font-size: 0.7rem;">¿BORRAR?</span>
        @else
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 7l16 0" />
            <path d="M10 11l0 6" />
            <path d="M14 11l0 6" />
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
        </svg>
        @endif
    </span>

    <span wire:loading wire:target="confirmDelete">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="hsl(0, 0%, 100%)" viewBox="0 0 24 24">
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
