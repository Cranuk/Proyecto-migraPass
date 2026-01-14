<section class="content-apps">
    @livewire('add-app')
    {{--@include('includes.alert')--}}
    @if($apps)
    @if($hasApps)
    <div class="list-app">
        <ul>
            <li>Listado de aplicaciones...</li>
        </ul>
    </div>
    @else
    <p class="message">No hay aplicaciones registradas para este usuario.</p>
    @endif
    @else
    <p class="message">Seleccione un usuario para ver revisar sus aplicaciones.</p>
    @endif

</section>
