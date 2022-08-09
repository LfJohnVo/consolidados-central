<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Id Distrital Field -->
{{-- <div class="form-group col-sm-12">
        <label for="exampleFormControlSelect1">Distrital</label>
        <select class="form-control" id="exampleFormControlSelect1" name="id_distrital">
            @foreach($distritals as $distrital)
            <option value="{{$distrital->id}}">{{$distrital->clave_distrito}} - {{$distrital->nombre}}</option>
            @endforeach
        </select>
</div> --}}

<!-- Estatus Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('estatus', 1, ['class' => 'form-control','maxlength' => 5,'maxlength' => 5]) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::hidden('gerente_id', 1, ['class' => 'form-control','maxlength' => 5,'maxlength' => 5]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('gerentes.index') }}" class="btn btn-default">Cancelar</a>
</div>
