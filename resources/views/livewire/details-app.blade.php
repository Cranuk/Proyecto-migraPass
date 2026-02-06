{{-- NOTE: mover esto a la card donde se vera la info de la aplicacion

--}}

<div class="details-app">
    <h3>Detalles de la aplicacion</h3>
    <div class="details-data">
        <label class="label-text">Nombre de la aplicacion:</label>
        <span class="label-text">{{$name}}</span>
    </div>
    <div class="details-data">
        <label class="label-text">Usuario:</label>
        <div class="label-text-plus">
            <span class="label-text">{{$user_aplication}}</span>
        </div>
    </div>
    <div class="details-data">
        <label class="label-text">Contraseña:</label>
        <div class="label-text-plus">
            <span class="label-text">{{ $showPassword ? $password_aplication : str_repeat('•', 10) }}</span>
            @include('includes.buttons.button-show-password')
        </div>
    </div>
    <div class="details-data">
        <label class="label-text">URL:</label>
        <div class="label-text-plus">
            <span class="label-text">{{$url_aplication}}</span>
            @include('includes.buttons.button-go-page')
        </div>
    </div>
    <div class="details-data">
        <label class="label-text">Notas:</label>
        <span class="label-text">{{$notes}}</span>
    </div>
</div>
