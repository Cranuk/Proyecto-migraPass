<div>
    @if($hasCompanies)
    <ul>
        @foreach ($companies as $company)
        <li @if($selectedCompany===$company->id) class="active" @endif>
            <div wire:click="selectCompany({{ $company->id }})">
                <div class="item">
                    <div class="alias">@acronym($company->name)</div>
                    <div class="name">{{ $company->name }}</div>
                    <div class="amount">{{ $company->users_count }} usuarios</div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    @else
    <p class="message">No hay empresas registradas.</p>
    @endif
</div>
