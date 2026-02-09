<button type="button" wire:click="toggleShowPassword" class="button cancel small">
    @if($showPassword)
    <span wire:loading.remove wire:target="toggleShowPassword">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
            <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
            <path d="M3 3l18 18" />
        </svg>
    </span>
    <span wire:loading wire:target="toggleShowPassword">
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
    @else
    <span wire:loading.remove wire:target="toggleShowPassword">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
        </svg>
    </span>
    <span wire:loading wire:target="toggleShowPassword">
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
    @endif
</button>
