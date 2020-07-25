<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Identificador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identificador', 'Identificador:') !!}
    {!! Form::text('identificador', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('regions.index') }}" class="btn btn-default">Cancelar</a>
</div>
