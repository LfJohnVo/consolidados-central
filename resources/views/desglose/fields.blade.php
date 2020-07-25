<div class="form-group row">
    <div class="form-group col-sm-3">
        {!! Form::label('primero', 'Inicio:') !!}
        {!! Form::date('primero', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-3">
        {!! Form::label('segundo', 'Final:') !!}
        {!! Form::date('segundo', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-3">
        <span>La busqueda es por:</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="radio" id="exampleRadios1" value="1" checked>
            <label class="form-check-label" for="exampleRadios1">
                Mes
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="radio" id="exampleRadios2" value="0">
            <label class="form-check-label" for="exampleRadios2">
                Año
            </label>
        </div>
    </div>

    <div class="form-group col-sm-3">
        <br>
        {!! Form::submit('buscar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('home') }}" class="btn btn-default">Cancelar</a>
    </div>
</div>
