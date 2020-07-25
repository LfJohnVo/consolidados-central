<div class="table-responsive">
    <table class="table table-hover text-center" id="clientes-table">
        <thead class="thead-dark">
        <tr>
            <th>Cliente</th>
            <th>Tipo</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->Cliente }}</td>
                <td>{{ $cliente->Tipo }}</td>
                <td>
                    {!! Form::open(['route' => ['clientes.destroy', $cliente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                    <!--<a href="{{ route('clientes.show', [$cliente->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('clientes.edit', [$cliente->id]) }}" class='btn btn-default btn-xs'>Editar</a>
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
