<!-- Grupo Field -->
<div class="form-group col-sm-12">
    {!! Form::label('grupo', 'Grupo:') !!}
    {!! Form::text('grupo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('grupos.index') }}" class="btn btn-default">Cancelar</a>
</div>
