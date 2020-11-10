<!-- No Proyecto Field -->
<div class="form-group">
    {!! Form::label('no_proyecto', 'No Proyecto:') !!}
    <p>{{ $proyecto->no_proyecto }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('Nombre', 'Nombre:') !!}
    <p>{{ $proyecto->Nombre }}</p>
</div>

<!-- Id Gerentes Field -->
<div class="form-group">
    {!! Form::label('id_gerentes', 'Id Gerentes:') !!}
    <p>{{ $proyecto->id_gerentes }}</p>
</div>

<!-- Id Grupo Field -->
<div class="form-group">
    {!! Form::label('id_grupo', 'Id Grupo:') !!}
    <p>{{ $proyecto->id_grupo }}</p>
</div>

<!-- Estatus Field -->
<div class="form-group">
    {!! Form::label('estatus', 'Estatus:') !!}
    <p>{{ $proyecto->estatus }}</p>
</div>

