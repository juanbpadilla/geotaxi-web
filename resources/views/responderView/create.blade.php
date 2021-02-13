@extends('layouts.app')

@section('contenido')
    <h1>Repondiendo</h1>

    @if( session()->has('info') )
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @else
    <form method="POST" action="{{ route('repuesta.store') }}">
        {!! csrf_field() !!}
        <p><label for="nombre">
            Nombre
            <input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
            {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
        </label></p>
        <p><label for="email">
            Email
            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
            {!! $errors->first('email', '<span class=error>:message</span>') !!}
        </label></p>
        <p><label for="mensaje">
            Mensaje
            <textarea class="form-control" type="text" name="mensaje">{{ old('mensaje') }}</textarea>
            {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
        </label></p>
        <input class="btn btn-primary" type="submit" value="{{ $btnText ?? 'Guardar' }}">
    </form>
    @endif
    <hr>
@stop