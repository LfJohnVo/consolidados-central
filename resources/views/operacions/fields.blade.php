<div class="form-group col-sm-12">
    <label for="sel1">Proyectos:</label>
    <select class="form-control" id="sel1" name="id_proyecto">
        <option value="">Seleccione una opcion</option>
        @foreach($proyectos as $proyecto)
            <option value="{!! $proyecto->id !!}">{!! $proyecto->nombre !!}</option>
        @endforeach
    </select>
</div>

<!-- Dia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dia', 'Dia:') !!}
    {!! Form::number('dia', null, ['class' => 'form-control']) !!}
</div>

<!-- No Operaciones Field -->
<div class="form-group col-sm-12">
    {!! Form::label('no_operaciones', 'No Operaciones:') !!}
    {!! Form::number('no_operaciones', null, ['class' => 'form-control', 'min' => '0']) !!}
</div>

<!-- Ano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ano', 'Ano:') !!}
    {!! Form::number('ano', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::date('fecha', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('operacions.index') }}" class="btn btn-default">Cancelar</a>
</div>
