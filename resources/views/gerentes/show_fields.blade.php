<!-- Id Proyecto Field -->
<div class="form-group">
    {!! Form::label('id_proyecto', 'Id Proyecto:') !!}
    <p>{{ $gerente->id_proyecto }}</p>
</div>

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

