<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Id Mat Articulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_mat_articulo', 'Id Mat Articulo:') !!}
    {!! Form::number('id_mat_articulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus', 'Estatus:') !!}
    {!! Form::text('estatus', null, ['class' => 'form-control','maxlength' => 5,'maxlength' => 5]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('conceptos.index') }}" class="btn btn-default">Cancel</a>
</div>
