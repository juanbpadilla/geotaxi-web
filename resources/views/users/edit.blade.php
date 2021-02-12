@extends('layouts.app')

@section('contenido')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Asignar Roles') }}</div>

                <div class="card-body">
                    
                    @if (session()->has('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                        <a class="nav-link" href="{{ route('usuarios.index') }}">◄ Volver</a>
                    @else
                    
                    <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
                        {!! method_field('PUT') !!}
                        @csrf
                        
                        @include('users.form')
                                

                        <div class="form-group row mb-0">
                            <a class="nav-link" href="{{ url()->previous() }}">◄ Volver</a>
                            <div class="col-md-2 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    
    
@stop