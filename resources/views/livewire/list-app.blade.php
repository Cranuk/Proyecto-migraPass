<section class="content-apps">
    @livewire('add-app')
    @if($userSelected)
    <div class="header">
        <div class="item-content no-pointer">
            <div class="alias">@acronym($userSelected->name)</div>
            <div class="card-user">
                <div class="data-user">
                    <div class="name">{{ $userSelected->name}}</div>
                    <div class="surname">{{ $userSelected->surname}}</div>
                </div>
                <div class="data-user">
                    <div class="sector">{{ $userSelected->sector}}</div>
                    &nbsp;|&nbsp;
                    <div class="fecha">{{ $userSelected->created_at}}</div>
                </div>
            </div>
        </div>
    </div>

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
