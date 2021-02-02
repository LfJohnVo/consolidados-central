<div class="table-responsive">
    <table class="table" id="tipoTraslados-table">
        <thead>
            <tr>
                <th>Tipo</th>
        <th>Estatus</th>
        <th>Update At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tipoTraslados as $tipoTraslado)
            <tr>
                <td>{{ $tipoTraslado->tipo }}</td>
            <td>{{ $tipoTraslado->estatus }}</td>
            <td>{{ $tipoTraslado->update_at }}</td>
                <td>
                    {!! Form::open(['route' => ['tipoTraslados.destroy', $tipoTraslado->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tipoTraslados.show', [$tipoTraslado->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('tipoTraslados.edit', [$tipoTraslado->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
