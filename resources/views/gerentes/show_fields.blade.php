<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $gerente->nombre }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $gerente->email }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $gerente->password }}</p>
</div>

<!-- Id Distrital Field -->
<div class="form-group">
    {!! Form::label('id_distrital', 'Id Distrital:') !!}
    <p>{{ $gerente->id_distrital }}</p>
</div>

<!-- Estatus Field -->
<div class="form-group">
    {!! Form::label('estatus', 'Estatus:') !!}
    <p>{{ $gerente->estatus }}</p>
</div>

