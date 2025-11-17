<div class="content-tools">
    @if($userSelected)
    <div class="header">
        <div>{{ $userSelected->name }}</div>
        @livewire('add-device')
        @livewire('add-app')
    </div>
    @endif
</div>
