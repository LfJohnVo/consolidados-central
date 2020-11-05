<div class="table-responsive">
    <table class="table" id="gerentes-table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Distrital</th>
            <th>Estatus</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gerentes as $gerente)
            <tr>
                <td>{{ $gerente->nombre }}</td>
                <td>{{ $gerente->email }}</td>
                <td>{{ $gerente->id_distrital }}</td>
                <td>
                    @if($gerente->estatus = 1)
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
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
</div>
