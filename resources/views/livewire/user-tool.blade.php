<div class="content-tools">
    @if($userSelected)
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
        <div class="buttons">
            @livewire('add-device')
            @livewire('add-app')
        </div>
    </div>
    @livewire('list-device')
    @livewire('list-app')
    @endif
</div>
