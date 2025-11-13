<div>
    @livewire('add-user')
    @if($companyId)

    @if($hasUsers)
    <ul>
        @foreach ($users as $user)
        <li>
            <div class="sidebar-item">
                <div class="alias">TEST</div>
                <div class="name">{{ $user->name }}</div>
                <div class="amount">{{ $count }} usuarios</div>
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
