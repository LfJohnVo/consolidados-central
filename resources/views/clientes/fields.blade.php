<!-- Cliente Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Cliente', 'Cliente:') !!}
    {!! Form::text('Cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Tipo', 'Tipo:') !!}
    {!! Form::text('Tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientes.index') }}" class="btn btn-default">Cancelar</a>
</div>
