<div class="table-responsive">
    <table class="table" id="conceptos-table">
        <thead>
        <tr>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Id Mat Articulo</th>
            <th>Estatus</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($conceptos as $concepto)
            <tr>
                <td>{{ $concepto->descripcion }}</td>
                <td>{{ $concepto->tipo }}</td>
                <td>{{ $concepto->id_mat_articulo }}</td>
                <td>{{ $concepto->estatus }}</td>
                <td>
                    {!! Form::open(['route' => ['conceptos.destroy', $concepto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('conceptos.show', [$concepto->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('conceptos.edit', [$concepto->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
