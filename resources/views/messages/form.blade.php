{!! csrf_field() !!}
@if($showFields)
    <p><label for="nombre">
        Nombre
        <input class="form-control" type="text" name="nombre" value="{{ old('nombre', $message->nombre) }}">
        {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
    </label></p>
    <p><label for="email">
        Email
        <input class="form-control" type="text" name="email" value="{{ old('email', $message->email) }}">
        {!! $errors->first('email', '<span class=error>:message</span>') !!}
    </label></p>
@endif
<p><label for="mensaje">
    Mensaje
    <textarea class="form-control" type="text" name="mensaje">{{ old('mensaje',$message->mensaje) }}</textarea>
    {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
</label></p>
<input class="btn btn-primary" type="submit" value="{{ $btnText ?? 'Guardar' }}">