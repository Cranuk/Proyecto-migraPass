<section class="content-apps">
    @if($apps)
    @livewire('form-app')
    {{--@include('includes.alert')--}}
    @if($hasApps)
    <div class="list-app">
        <ul>
            @foreach($apps as $app)
            <li @if($selectedApp===$app->id) class="selected" @endif>
                <div wire:click="selectApp({{ $app->id }})">
                    <div class="item">
                        {{ $app->name }}
                        <span wire:loading wire:target="selectApp({{ $app->id }})">
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
                        @if($selectedApp === $app->id)
                        <div class="tools">
                            @include('includes.buttons.button-delete-app', ['appId' => $app->id])
                            @include('includes.buttons.button-edit-app', ['appId' => $app->id])
                        </div>
                        @endif
                    </div>
                </div>

            </li>
            @endforeach
        </ul>
    </div>
    @else
    <p class="message">No hay aplicaciones registradas para este usuario.</p>
    @endif
    @else
    <p class="message">Seleccione un usuario para ver revisar sus aplicaciones.</p>
    @endif

</section>
