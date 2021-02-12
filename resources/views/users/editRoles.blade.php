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
                        
                        <table class="table">
                            <tr>
                                <th>Nombre:</th>
                                <td>{{ $user->nombre }} {{ $user->apellido }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    @if(auth()->check())
                                        @if (auth()->user()->hasRoles(['admin']))
                                        <div class="col-md-8">
                                            @foreach($roles as $id => $name)
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input 
                                                            type="checkbox" class="form-check-input" 
                                                            value="{{ $id }}" {{ $user->present()->check($id) }}
                                                            name="roles[]">
                                                        {{ $name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    @endif
                                    {!! $errors->first('roles', '<span class=error>:message</span>') !!}
                                </th>
                            </tr>
                        </table>

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