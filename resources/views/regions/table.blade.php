<div class="table-responsive">
    <table class="table" id="regions-table">
        <thead>
        <tr>
            <th>Nombre Regional</th>
            <th>Clave Region</th>
            <th>Estatus</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($regions as $region)
            <tr>
                <td>{{ $region->nombre_regional }}</td>
                <td>{{ $region->clave_region }}</td>
                <td>
                    @if($region->ESTATUS = 1)
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
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
