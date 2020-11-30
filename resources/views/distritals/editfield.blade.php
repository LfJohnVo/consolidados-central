<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Clave Distrito Field -->
<div class="form-group col-sm-12">
    {!! Form::label('clave_distrito', 'Clave Distrito:') !!}
    {!! Form::text('clave_distrito', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Id Regional Field -->
<div class="form-group col-sm-12">
    <label for="exampleFormControlSelect1">Regionales</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_regional">
        @foreach($regionales as $regional)
            <option value="{{$regional->id}}">{{$regional->nombre_regional}}</option>
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
    <a href="{{ route('distritals.index') }}" class="btn btn-default">Cancelar</a>
</div>
