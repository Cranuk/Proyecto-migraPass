@extends('layouts.web')

@section('title', 'Usuarios')

@section('user-content')

<section class="section-user">
    <div class="header">
        <div>Usuarios</div><a href={{ route('users.add') }} class="button add">Añadir usuario</a>
    </div>
    <div>
        No hay usuarios en esta empresa
    </div>
</section>

@endsection
