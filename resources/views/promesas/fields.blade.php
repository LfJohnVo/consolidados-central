<!-- Promesa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('promesa', 'Promesa:') !!}
    {!! Form::number('promesa', null, ['class' => 'form-control']) !!}
</div>

<!-- Pagado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pagado', 'Pagado:') !!}
    {!! Form::number('pagado', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    {!! Form::number('id_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Compromete Central Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compromete_central', 'Compromete Central:') !!}
    {!! Form::text('compromete_central', null, ['class' => 'form-control']) !!}
</div>

<!-- Compromete Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Compromete_cliente', 'Compromete Cliente:') !!}
    {!! Form::text('Compromete_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Promesa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_promesa', 'Fecha Promesa:') !!}
    {!! Form::text('Fecha_promesa', null, ['class' => 'form-control','id'=>'Fecha_promesa']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#Fecha_promesa').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Fecha Pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Fecha_pago', 'Fecha Pago:') !!}
    {!! Form::text('Fecha_pago', null, ['class' => 'form-control','id'=>'Fecha_pago']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#Fecha_pago').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('promesas.index') }}" class="btn btn-default">Cancelar</a>
</div>
