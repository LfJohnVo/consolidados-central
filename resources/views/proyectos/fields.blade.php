<!-- No Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_proyecto', 'No Proyecto:') !!}
    {!! Form::number('no_proyecto', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre', 'Nombre:') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Id Gerentes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_gerentes', 'Id Gerentes:') !!}
    {!! Form::number('id_gerentes', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Grupo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_grupo', 'Id Grupo:') !!}
    {!! Form::number('id_grupo', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus', 'Estatus:') !!}
    {!! Form::text('estatus', null, ['class' => 'form-control','maxlength' => 1,'maxlength' => 1]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('proyectos.index') }}" class="btn btn-default">Cancel</a>
</div>
