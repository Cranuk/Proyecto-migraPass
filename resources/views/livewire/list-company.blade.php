<div>
    @if($message)
    <div class="alert alert-notice">
        {{ $message }}
        <button wire:click="$set('message', '')">x</button>
    </div>
    @endif
    @if($hasCompanies)
    <ul>
        @foreach ($companies as $company)
        <li @if($selectedCompany===$company->id) class="active" @endif>
            <div wire:click="selectCompany({{ $company->id }})">
                <div class="item">
                    <div class="alias">@acronym($company->name)</div>
                    <div class="name">{{ $company->name }}<strong class="amount">({{ $company->users_count }} Usu.)</strong></div>
                    @if($selectedCompany === $company->id)
                    <div class="tools">
                        @include('includes.buttons.button-delete-company', ['companyId' => $company->id])
                    </div>
                    @endif
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    @else
    <p class="message">No hay empresas registradas.</p>
    @endif
</div>
