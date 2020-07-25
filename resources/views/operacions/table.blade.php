<div class="table-responsive">
    <table class="table table-hover text-center" id="operacions-table">
        <thead class="thead-dark">
        <tr>
            <th>Proyecto</th>
            <th>No Operaciones</th>
            <th>Dia/Mes/Año</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($operacions as $operacion)
            <tr>
                <td>{{ $operacion->proyectonombre }}</td>
                <td>{{ $operacion->no_operaciones }}</td>
                <td>{{ $operacion->dia }}/{{ $operacion->mes }}/{{ $operacion->ano }}</td>
                <td>
                    {!! Form::open(['route' => ['operacions.destroy', $operacion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                    <!--<a href="{{ route('operacions.show', [$operacion->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('operacions.edit', [$operacion->id]) }}"
                           class='btn btn-default btn-xs'>Editar</a>
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$operacions->links()}}
</div>
