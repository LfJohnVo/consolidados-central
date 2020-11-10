<!-- No Proyecto Field -->
<div class="form-group col-sm-12">
    {!! Form::label('no_proyecto', 'No Proyecto:') !!}
    {!! Form::number('no_proyecto', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Nombre', 'Nombre:') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Id Gerentes Field -->
<div class="form-group col-sm-12">
    <label for="exampleFormControlSelect1">Gerente</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_gerentes">
        @foreach($gerentes as $gerente)
            <option value="{{$gerente->id}}">{{$gerente->nombre}}</option>
        @endforeach
    </select>
</div>

<!-- Id Grupo Field -->
<div class="form-group col-sm-12">
    <label for="exampleFormControlSelect1">Grupo</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_grupo">
        @foreach($grupos as $grupo)
            <option value="{{$grupo->id_grupos}}">{{$grupo->grupo}}</option>
        @endforeach
    </select>
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-12">
    <label for="exampleFormControlSelect1">Estatus</label>
    <select class="form-control" id="exampleFormControlSelect1" name="estatus">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('proyectos.index') }}" class="btn btn-default">Cancelar</a>
</div>
