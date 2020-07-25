<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $concepto->descripcion }}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{{ $concepto->tipo }}</p>
</div>

<!-- Id Mat Articulo Field -->
<div class="form-group">
    {!! Form::label('id_mat_articulo', 'Id Mat Articulo:') !!}
    <p>{{ $concepto->id_mat_articulo }}</p>
</div>

<!-- Estatus Field -->
<div class="form-group">
    {!! Form::label('estatus', 'Estatus:') !!}
    <p>{{ $concepto->estatus }}</p>
</div>

