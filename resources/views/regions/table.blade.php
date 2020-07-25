<div class="table-responsive">
    <table class="table table-hover text-center" id="regions-table">
        <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Identificador</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($regions as $region)
            <tr>
                <td>{{ $region->nombre }}</td>
                <td>{{ $region->identificador }}</td>
                <td>
                    {!! Form::open(['route' => ['regions.destroy', $region->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--<a href="{{ route('regions.show', [$region->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>-->
                        <a href="{{ route('regions.edit', [$region->id]) }}" class='btn btn-default btn-xs'>Editar</a>
                        {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
