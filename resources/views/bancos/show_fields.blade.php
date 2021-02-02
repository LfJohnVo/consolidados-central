<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $banco->nombre }}</p>
</div>

<!-- Estatus Field -->
<div class="form-group">
    {!! Form::label('estatus', 'Estatus:') !!}
    <p>{{ $banco->estatus }}</p>
</div>

<!-- Update At Field -->
<div class="form-group">
    {!! Form::label('update_at', 'Update At:') !!}
    <p>{{ $banco->update_at }}</p>
</div>

