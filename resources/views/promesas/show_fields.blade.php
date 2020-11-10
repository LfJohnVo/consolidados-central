<!-- Promesa Field -->
<div class="form-group">
    {!! Form::label('promesa', 'Promesa:') !!}
    <p>{{ $promesa->promesa }}</p>
</div>

<!-- Pagado Field -->
<div class="form-group">
    {!! Form::label('pagado', 'Pagado:') !!}
    <p>{{ $promesa->pagado }}</p>
</div>

<!-- Id Cliente Field -->
<div class="form-group">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    <p>{{ $promesa->id_cliente }}</p>
</div>

<!-- Compromete Central Field -->
<div class="form-group">
    {!! Form::label('compromete_central', 'Compromete Central:') !!}
    <p>{{ $promesa->compromete_central }}</p>
</div>

<!-- Compromete Cliente Field -->
<div class="form-group">
    {!! Form::label('Compromete_cliente', 'Compromete Cliente:') !!}
    <p>{{ $promesa->Compromete_cliente }}</p>
</div>

<!-- Fecha Promesa Field -->
<div class="form-group">
    {!! Form::label('Fecha_promesa', 'Fecha Promesa:') !!}
    <p>{{ $promesa->Fecha_promesa }}</p>
</div>

<!-- Fecha Pago Field -->
<div class="form-group">
    {!! Form::label('Fecha_pago', 'Fecha Pago:') !!}
    <p>{{ $promesa->Fecha_pago }}</p>
</div>

