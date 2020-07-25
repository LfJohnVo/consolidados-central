<!-- No Proyecto Field -->
<div class="form-group col-sm-12">
    {!! Form::label('no_proyecto', 'No Proyecto:') !!}
    {!! Form::number('no_proyecto', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Nombre', 'Nombre:') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <label for="sel1">Region:</label>
    <select class="form-control" id="sel1" name="id_region">
        <option value="">Seleccione una opcion</option>
        @foreach($regiones as $region)
            <option value="{!! $region->id !!}">{!! $region->identificador !!}/{!! $region->nombre !!}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-12">
    <label for="sel1">Grupo:</label>
    <select class="form-control" id="sel1" name="id_grupo">
        <option value="">Seleccione una opcion</option>
        @foreach($grupos as $grupo)
            <option value="{!! $grupo->id_grupos !!}">{!! $grupo->grupo !!}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('proyectos.index') }}" class="btn btn-default">Cancelar</a>
</div>
