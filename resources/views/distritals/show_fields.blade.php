<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $distrital->nombre }}</p>
</div>

<!-- Clave Distrito Field -->
<div class="form-group">
    {!! Form::label('clave_distrito', 'Clave Distrito:') !!}
    <p>{{ $distrital->clave_distrito }}</p>
</div>

<!-- Id Regional Field -->
<div class="form-group">
    {!! Form::label('id_regional', 'Id Regional:') !!}
    <p>{{ $distrital->id_regional }}</p>
</div>

<!-- Estatus Field -->
<div class="form-group">
    {!! Form::label('estatus', 'Estatus:') !!}
    <p>{{ $distrital->estatus }}</p>
</div>

