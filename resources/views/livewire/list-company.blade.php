<div>
    @if($hasCompanies)
    <ul>
        @foreach ($companies as $company)
        <li>
            <div wire:click="selectCompany({{ $company->id }})">
                <div class="sidebar-item">
                    <div class="alias">TEST</div>
                    <div class="name">{{ $company->name }}</div>
                    <div class="amount">0 usuarios</div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    @else
    <p class="message">No hay empresas registradas.</p>
    @endif
</div>
