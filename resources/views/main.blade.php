@extends('layouts.web')

@section('title', 'Pagina de inicio')

@section('content-main')

<section class="section-content">
    @livewire('list-user')
    @livewire('list-device')
</section>

@endsection
