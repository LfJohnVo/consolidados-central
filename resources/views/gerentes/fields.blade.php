<div class="form-group col-sm-12">
    <label for="sel1">Proyectos:</label>
    <select class="form-control" id="sel1" name="id_proyecto">
        <option value="">Seleccione una opcion</option>
        @foreach($proyectos as $proyecto)
            <option value="{!! $proyecto->id !!}">{!! $proyecto->nombre !!}</option>
        @endforeach
    </select>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('gerentes.index') }}" class="btn btn-default">Cancelar</a>
</div>
