<div class="table-responsive">
    <table class="table table-hover text-center" id="gerentes-table">
        <thead class="thead-dark">
        <tr>
            <th>Proyecto</th>
            <th>Nombre</th>
            <th>Email</th>
            <!--<th>Password</th>-->
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gerentes as $gerente)
            <tr>
                <td>{{ $gerente->ProyectoNombre }}</td>
                <td>{{ $gerente->nombre }}</td>
                <td>{{ $gerente->email }}</td>
                <!--<td>{{ $gerente->password }}</td>-->
                <td>
                    {!! Form::open(['route' => ['gerentes.destroy', $gerente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--<a href="{{ route('gerentes.show', [$gerente->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('gerentes.edit', [$gerente->id]) }}" class='btn btn-default btn-xs'>Editar</a>
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$gerentes->links()}}
</div>
