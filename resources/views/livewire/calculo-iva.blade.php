<div>
    <!-- No Operaciones Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('tickets', 'Costo boleto promedio:') !!}
        {!! Form::number('tickets', null, ['class' => 'form-control', 'required', 'wire:model' => 'tickets']) !!}
    </div>
    <div wire:loading>
        <p>Calculando IVA...</p>
        <br><br><br>
    </div>
    <div wire:loading.remove>
        <div class="form-group col-sm-12">
            {!! Form::label('iva', 'Iva boleto promedio:') !!}
            {!! Form::number('iva', null, ['class' => 'form-control', 'required', 'wire:model' => 'iva', 'readonly']) !!}
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('total', 'Total boleto promedio:') !!}
            {!! Form::number('total', null, ['class' => 'form-control', 'required', 'wire:model' => 'total', 'readonly']) !!}
        </div>
    </div>
</div>
