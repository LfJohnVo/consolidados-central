<div class="table-responsive">
    <table class="table" id="operacionHistoricos-table">
        <thead>
            <tr>
                <th>Fecha</th>
        <th>Id Proyecto</th>
        <th>Id Catalogo</th>
        <th>Estatus</th>
        <th>No Operaciones</th>
        <th>Id Concepto</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($operacionHistoricos as $operacionHistorico)
            <tr>
                <td>{{ $operacionHistorico->fecha }}</td>
            <td>{{ $operacionHistorico->id_proyecto }}</td>
            <td>{{ $operacionHistorico->id_catalogo }}</td>
            <td>{{ $operacionHistorico->estatus }}</td>
            <td>{{ $operacionHistorico->no_operaciones }}</td>
            <td>{{ $operacionHistorico->id_concepto }}</td>
                <td>
                    {!! Form::open(['route' => ['operacionHistoricos.destroy', $operacionHistorico->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('operacionHistoricos.show', [$operacionHistorico->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('operacionHistoricos.edit', [$operacionHistorico->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
