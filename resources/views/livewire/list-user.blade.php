<section class="content-users">
    @livewire('form-user')
    @if($companyId)
    @include('includes.alert')
    @if($hasUsers)
    <ul>
        @foreach ($users as $user)
        <li @if($selectedUser===$user->id) class="active" @endif>
            <div wire:click="selectUser({{ $user->id }})">
                <div class="item-content" wire:click="selectUser({{ $user->id }})">
                    <div class="alias">@acronym($user->name)</div>
                    <div class="card-content">
                        <div class="data-content">
                            <div class="name">{{ $user->name }}</div>
                            <div class="surname">{{ $user->surname }}</div>
                        </div>
                        <div class="data-content">
                            <div class="sector">{{ $user->sector }}</div>
                            &nbsp;|&nbsp;
                            <div class="fecha">{{ $user->created_at }}</div>
                        </div>
                    </div>
                    <span wire:loading wire:target="selectUser({{ $user->id }})">
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
                    @if($selectedUser === $user->id)
                    <div class="tools">
                        @include('includes.buttons.button-delete-user', ['userId' => $user->id])
                        @include('includes.buttons.button-edit-user', ['userId' => $user->id])
                    </div>
                    @endif
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
</section>
