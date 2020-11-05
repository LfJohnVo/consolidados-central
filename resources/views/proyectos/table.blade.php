<div class="table-responsive">
    <table class="table" id="proyectos-table">
        <thead>
        <tr>
            <th>No Proyecto</th>
            <th>Nombre</th>
            <th>Gerentes</th>
            <th>Grupo</th>
            <th>Estatus</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->no_proyecto }}</td>
                <td>{{ $proyecto->Nombre }}</td>
                <td>{{ $proyecto->id_gerentes }}</td>
                <td>{{ $proyecto->id_grupo }}</td>
                <td>
                    @if($proyecto->estatus = 1)
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['proyectos.destroy', $proyecto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                    <!--<a href="{{ route('proyectos.show', [$proyecto->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('proyectos.edit', [$proyecto->id]) }}"
                           class='btn btn-default btn-xs'>Editar</a>
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
