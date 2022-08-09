<div class="table-responsive">
    <table class="table" id="depositos-table">
        <thead>
            <tr>
                <th>Fecha Deposito</th>
                <th>Tipo Traslado</th>
                <th>Ingreso Dep Central</th>
                <th>Ingreso Dep Cliente</th>
                <th>Fecha Venta</th>
                <th>Folio</th>
                <th>Proyecto</th>
                <!--<th>Id Bancos</th>-->
                <th>Archivo Pago</th>
                <th>Banco</th>
                <th>Comentario</th>
                <!--<th colspan="3">Acción</th>-->
            </tr>
        </thead>
        <tbody>
            @foreach ($depositos as $deposito)
                <tr>
                    <td>{{ $deposito->fecha_deposito }}</td>
                    <td>{{ $deposito->tipo_traslado }}</td>
                    <td>{{ $deposito->ingreso_dep_central }}</td>
                    <td>{{ $deposito->ingreso_dep_cliente }}</td>
                    <td>{{ $deposito->fecha_venta }}</td>
                    <td>{{ $deposito->folios_traslado }}</td>
                    <td>
                        @php
                            $proyecto = \App\Models\Proyecto::select('Nombre')->find($deposito->id_proyecto);
                        @endphp
                        {{ $proyecto->Nombre }}
                    </td>
                    <td>
                        @if ($deposito->archivo_pago)
                            <a href="{!! route('img', [$deposito->id]) !!}" class='btn-floating btn-sm btn-blue-grey'>Descargar</a>
                        @else
                            Sin archivo
                        @endif
                    </td>
                    <td>
                        @if (!empty($deposito->id_bancos))
                            @php
                                $banco = DB::connection('mysql2')->table('cat_bancos')->select('nombre')->where('id', $deposito->id_bancos)->first();
                            @endphp
                            {{ $banco->nombre }}
                        @else
                            Sin asignar
                        @endif
                    </td>
                    <td>
                        @if (isset($deposito->comentario))
                            {{ $deposito->comentario }}
                        @else
                            Sin comentario
                        @endif
                    </td>
                    <!--<td>
                    {!! Form::open(['route' => ['depositos.destroy', $deposito->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('depositos.show', [$deposito->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('depositos.edit', [$deposito->id]) }}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>-->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
