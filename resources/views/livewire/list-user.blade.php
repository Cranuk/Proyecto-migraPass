<div class="content-user">
    @livewire('add-user')
    @if($companyId)

    @if($hasUsers)
    <ul>
        @foreach ($users as $user)
        <li>
            <div class="item-content">
                <div class="alias">@acronym($user->name)</div>
                <div class="card-user">
                    <div class="data-user">
                        <div class="name">{{ $user->name }}</div>
                        <div class="surname">{{ $user->surname }}</div>
                    </div>
                    <div class="data-user">
                        <div class="sector">{{ $user->sector }}</div> -
                        <div class="fecha">{{ $user->created_at }}</div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    @else
    <p class="message">No hay usuarios registrados para esta empresa.</p>
    @endif

    @else
    <p class="message">Seleccioná una empresa para ver sus usuarios.</p>
    @endif
</div>
