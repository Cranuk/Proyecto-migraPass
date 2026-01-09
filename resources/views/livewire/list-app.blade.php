<section class="content-apps">
    @if(isset($userSelected->id))
    <div class="header">
        <div class="item-content no-pointer">
            <div class="alias">@acronym($userSelected->name)</div>
            <div class="card-user">
                <div class="data-user">
                    <div class="name">{{ $userSelected->name }}</div>
                    <div class="surname">{{ $userSelected->surname }}</div>
                </div>
                <div class="data-user">
                    <div class="sector">{{ $userSelected->sector }}</div>
                    &nbsp;|&nbsp;
                    <div class="fecha">{{ $userSelected->created_at }}</div>
                </div>
            </div>
        </div>
        @livewire('add-app')
    </div>
    <div class="list-app">
        @if($hasApps)
        <ul>
            <li>1</li>
            <li>2</li>
            <li>3</li>
        </ul>
        @else
        <p class="message">No hay aplicaciones registrados para este usuario.</p>
        @endif
    </div>
    @endif
</section>
