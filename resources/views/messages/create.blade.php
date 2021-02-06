@extends('layouts.app')

@section('contenido')
    <h1>Contáctame</h1>

    @if( session()->has('info') )
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @else
    <form method="POST" action="{{ route('mensajes.store') }}">
        @include('messages.form', [
            'message' => new App\Message,
            'showFields' => auth()->guest()
            ])
    </form>
    @endif
    <hr>
@stop