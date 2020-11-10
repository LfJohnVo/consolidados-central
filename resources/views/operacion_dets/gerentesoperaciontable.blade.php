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
        </tr>
        </thead>
        <tbody>
        @foreach($proyectos as $operacionDet)
            <tr>
                <td>{{ $operacionDet->fecha }}</td>
                <td>{{ $operacionDet->no_operaciones }}</td>
                <td>{{ $operacionDet->id_proyecto }}</td>
            <!--td>{{ $operacionDet->estatus }}</td>-->
            <!--<td>{{ $operacionDet->id_concepto }}</td>-->
                <td>{{ $operacionDet->tickets }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$proyectos->links()}}
</div>
