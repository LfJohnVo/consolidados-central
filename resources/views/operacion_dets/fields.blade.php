<!-- Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', null, ['class' => 'form-control','id'=>'fecha', 'required']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- No Operaciones Field -->
<div class="form-group col-sm-12">
    {!! Form::label('no_operaciones', 'No Operaciones:') !!}
    {!! Form::number('no_operaciones', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-12">
    <label for="sel1">Proyectos:</label>
    <select class="form-control" id="sel1" name="id_proyecto" required>
        <option value="">Seleccione una opcion</option>
        @foreach($proyectos as $proyecto)
            <option value="{!! $proyecto->id !!}">({!! $proyecto->no_proyecto !!})/{!! $proyecto->Nombre !!}</option>
        @endforeach
    </select>
</div>

<!--<div class="form-group col-sm-12">
    <label for="sel1">Conceptos:</label>
    <select class="form-control" id="sel1" name="id_concepto">
        <option value="">Seleccione una opcion</option>
        @foreach($conceptops as $concepto)
            <option value="{!! $concepto->id_catalogo !!}">{!! $concepto->descripcion !!}</option>
        @endforeach
    </select>
</div>-->

<!-- No Operaciones Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tickets', 'Costo boleto promedio:') !!}
    {!! Form::number('tickets', null, ['class' => 'form-control', 'required']) !!}
</div>

    {!! Form::hidden('estatus', 1, ['class' => 'form-control']) !!}

<!-- Id Concepto Field -->
<!--<div class="form-group col-sm-12">
    {!! Form::label('id_concepto', 'Id Concepto:') !!}
    {!! Form::number('id_concepto', null, ['class' => 'form-control', 'required']   ) !!}
</div>-->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('operacionDets.index') }}" class="btn btn-default">Cancelar</a>
</div>
