<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
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

<!-- Id Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_proyecto', 'Id Proyecto:') !!}
    {!! Form::number('id_proyecto', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Catalogo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_catalogo', 'Id Catalogo:') !!}
    {!! Form::number('id_catalogo', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus', 'Estatus:') !!}
    {!! Form::text('estatus', null, ['class' => 'form-control']) !!}
</div>

<!-- No Operaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_operaciones', 'No Operaciones:') !!}
    {!! Form::number('no_operaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Concepto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_concepto', 'Id Concepto:') !!}
    {!! Form::number('id_concepto', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('operacionHistoricos.index') }}" class="btn btn-default">Cancel</a>
</div>
