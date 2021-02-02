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
            <!--<th colspan="3">Acción</th>-->
        </tr>
        </thead>
        <tbody>
        @foreach($consolidados as $item)
            <tr>
                <td>{{$item->fecha}}</td>
                <td>{{$item->no_operaciones}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->tickets}}</td>
                <!--<td>
                    {!! Form::open(['route' => ['operacionDets.destroy', $item->op_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                    <a href="{{ route('operacionDets.show', [$item->op_id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('operacionDets.edit', [$item->op_id]) }}" class='btn btn-default btn-xs'>Editar</a>
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>-->
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
