<div class="table-responsive">
    <table class="table table-hover text-center" id="grupos-table">
        <thead class="thead-dark">
            <tr>
                <th>Grupo</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($grupos as $grupo)
            <tr>
                <td>{{ $grupo->grupo }}</td>
                <td>
                    {!! Form::open(['route' => ['grupos.destroy', $grupo->id_grupos], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--<a href="{{ route('grupos.show', [$grupo->id_grupos]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('grupos.edit', [$grupo->id_grupos]) }}" class='btn btn-default btn-xs'>Editar</a>
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
