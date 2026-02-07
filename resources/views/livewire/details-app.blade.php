<div class="details-app">
    <h3>Detalles de la aplicacion</h3>
    <div class="details-data">
        <label class="label-text">Nombre de la aplicacion:</label>
        <div class="label-text-plus">
            <p class="label-text">{{$name}}</p>
            @include('includes.buttons.button-go-page')
        </div>
    </div>
    <div class="details-data">
        <label class="label-text">Usuario:</label>
        <div class="label-text-plus">
            <p class="label-text">{{$user_aplication}}</p>
            <button type="button" class="button cancel small btn-copy" data-clipboard-text="{{ $user_aplication }}" title="Copiar usuario">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-copy">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M7 9.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667l0 -8.666" />
                    <path d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" /></svg>
            </button>
        </div>
    </div>
    <div class="details-data">
        <label class="label-text">Contraseña:</label>
        <div class="label-text-plus">
            <p class="label-text">{{ $showPassword ? $password_aplication : str_repeat('•', 10) }}</p>
            @include('includes.buttons.button-show-password')
            <button type="button" class="button cancel small btn-copy" data-clipboard-text="{{ $password_aplication }}" title="Copiar contraseña">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-copy">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M7 9.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667l0 -8.666" />
                    <path d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" /></svg>
            </button>
        </div>
    </div>
    <div class="details-data">
        <label class="label-text">Notas:</label>
        <p class="label-text">{{$notes}}</p>
    </div>
</div>
