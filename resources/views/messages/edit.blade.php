@extends('layouts.app')

@section('contenido')
    <a class="nav-link" href="{{ route('mensajes.index') }}">◄ Volver</a><h1>Editando mensaje</h1>
    <form method="POST" action="{{ route('mensajes.update', $message->id) }}">
        {!! method_field('PUT') !!}

        @include('messages.form', [
            'btnText' => 'Actualizar',
            'showFields' => ! $message->user_id
        ])
    </form>
    <hr>
@stop