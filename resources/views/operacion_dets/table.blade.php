<div class="table-responsive">
    <table class="table table-hover text-center" id="operacionDets-table">
        <thead class="thead-dark">
        <tr>
            <th>Fecha</th>
            <th>No Operaciones</th>
            <th>Proyecto</th>
            <!--th>Estatus</th>-->
            <!--<th>Id Concepto</th>-->
            <th>Boleto</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($operacionDets as $operacionDet)
            <tr>
                <td>{{ $operacionDet->fecha }}</td>
                <td>{{ $operacionDet->no_operaciones }}</td>
                <td>{{ $operacionDet->id_proyecto }}</td>
                <!--td>{{ $operacionDet->estatus }}</td>-->
                <!--<td>{{ $operacionDet->id_concepto }}</td>-->
                <td>{{ $operacionDet->tickets }}</td>
                <td>
                    {!! Form::open(['route' => ['operacionDets.destroy', $operacionDet->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--<a href="{{ route('operacionDets.show', [$operacionDet->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('operacionDets.edit', [$operacionDet->id]) }}" class='btn btn-default btn-xs'>Editar</a>
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
