@extends('layout')

@section('contenido')
    
    @if (session()->has('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
        <a class="nav-link" href="{{ route('usuarios.index') }}">◄ Volver</a>
    @else
    <a class="nav-link" href="{{ route('usuarios.index') }}">◄ Volver</a><h1>Editando mensaje de {{ $user->nombre }}</h1>
    <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
        {!! method_field('PUT') !!}

        @include('users.form')

        <button class="btn btn-info" type="submit">Enviar</button>
    </form>
    @endif
@stop