<!-- Fecha Deposito Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_deposito', 'Fecha Deposito:') !!}
    {!! Form::text('fecha_deposito', null, ['class' => 'form-control','id'=>'fecha_deposito']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_deposito').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<div class="form-group col-sm-12">
    <label for="sel1">Tipo traslado:</label>
    <select class="form-control" id="sel1" name="tipo_traslado">
        <option value="">Seleccione una opcion</option>
        @foreach($traslados as $item)
            <option value="{!! $item->tipo !!}">{!! $item->tipo !!}</option>
        @endforeach
    </select>
</div>

<!-- Ingreso Dep Central Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_dep_central', 'Ingreso Dep Central:') !!}
    {!! Form::number('ingreso_dep_central', null, ['class' => 'form-control']) !!}
</div>

<!-- Ingreso Dep Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_dep_cliente', 'Ingreso Dep Cliente:') !!}
    {!! Form::number('ingreso_dep_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Venta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_venta', 'Fecha Venta:') !!}
    {!! Form::text('fecha_venta', null, ['class' => 'form-control','id'=>'fecha_venta']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_venta').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Folios Traslado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('folios_traslado', 'Folios Traslado:') !!}
    {!! Form::text('folios_traslado', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Id Proyecto Field -->
<div class="form-group col-sm-12">
    <label for="sel1">Proyectos:</label>
    <select class="form-control" id="sel1" name="id_proyecto">
        <option value="">Seleccione una opcion</option>
        @foreach($datos as $proyecto)
            <option value="{!! $proyecto->id_proyecto !!}">({!! $proyecto->no_proyecto !!}
                )/{!! $proyecto->nombre !!}</option>
        @endforeach
    </select>
</div>

<!-- Id Gerente Field -->
{!! Form::hidden('id_gerente', $id_gerente, ['class' => 'form-control']) !!}

<!-- Id Bancos Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('id_bancos', 'Id Bancos:') !!}
    {!! Form::number('id_bancos', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Archivo Pago Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('archivo_pago', 'Archivo Pago:') !!}
    {!! Form::textarea('archivo_pago', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('depositos.index') }}" class="btn btn-default">Cancelar</a>
</div>
