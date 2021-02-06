{!! csrf_field() !!}

<p><label for="nombre">
    Nombre
    <input class="form-control" type="text" name="nombre" value="{{ old('nombre', $user->nombre) }}">
    {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
</label></p>
<p><label for="apellido">
    Apellido
    <input class="form-control" type="text" name="apellido" value="{{ old('apellido', $user->apellido) }}">
    {!! $errors->first('apellido', '<span class=error>:message</span>') !!}
</label></p>

<p><label for="telefono">
    Teléfono
    <input class="form-control" type="text" name="telefono" value="{{ old('telefono', $user->telefono) }}">
    {!! $errors->first('telefono', '<span class=error>:message</span>') !!}
</label></p>
<p><label for="email">
    Email
    <input class="form-control" type="text" name="email" value="{{ old('email', $user->email) }}">
    {!! $errors->first('email', '<span class=error>:message</span>') !!}
</label></p>

@unless($user->id)
    <p><label for="password">
        Password
        <input class="form-control" type="password" name="password">
        {!! $errors->first('password', '<span class=error>:message</span>') !!}
    </label></p>

    <p><label for="password_confirmation">
        Password Confirm
        <input class="form-control" type="password" name="password_confirmation">
        {!! $errors->first('password_confirmation', '<span class=error>:message</span>') !!}
    </label></p>    
@endunless
@if(auth()->check())
    @if (auth()->user()->hasRoles(['admin']))
    <div>
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
{!! htmlFormSnippet() !!}
{!! $errors->first('g-recaptcha-response', '<span class=error>:message</span>') !!}
<hr>
