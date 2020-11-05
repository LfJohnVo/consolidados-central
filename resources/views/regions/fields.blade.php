<!-- Nombre Regional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_regional', 'Nombre Regional:') !!}
    {!! Form::text('nombre_regional', null, ['class' => 'form-control','maxlength' => 150,'maxlength' => 150]) !!}
</div>

<!-- Clave Region Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clave_region', 'Clave Region:') !!}
    {!! Form::text('clave_region', null, ['class' => 'form-control','maxlength' => 25,'maxlength' => 25]) !!}
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ESTATUS', 'Estatus:') !!}
    {!! Form::text('ESTATUS', null, ['class' => 'form-control','maxlength' => 1,'maxlength' => 1]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('regions.index') }}" class="btn btn-default">Cancel</a>
</div>
