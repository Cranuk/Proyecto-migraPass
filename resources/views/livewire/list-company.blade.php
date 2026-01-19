<section class="content-companies">
    @livewire('form-company')
    @include('includes.alert')
    @if($hasCompanies)
    <ul>
        @foreach ($companies as $company)
        <li @if($selectedCompany===$company->id) class="active" @endif>
            <div wire:click="selectCompany({{ $company->id }})">
                <div class="item">
                    <div class="alias">@acronym($company->name)</div>
                    <div class="name">{{ $company->name }}<strong class="amount">({{ $company->users_count }} Usu.)</strong></div>
                    <span wire:loading wire:target="selectCompany({{ $company->id }})">
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
                    @if($selectedCompany === $company->id)
                    <div class="tools">
                        @include('includes.buttons.button-delete-company', ['companyId' => $company->id])
                        @include('includes.buttons.button-edit-company', ['companyId' => $company->id])
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
</section>
