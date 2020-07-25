@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="pull-center">
            @if($sqls)
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="informacion">
                    <strong>¡Algunos gerentes no han cargado su informacion!</strong>
                    <ul>
                        @foreach($sqls as $sql)
                            <li>Proyecto: {!! $sql->numero_proyecto !!} / {!! $sql->nombre_proyecto !!}
                                - {!! $sql->correo !!}</li>
                        @endforeach
                    </ul>
                    <hr>
                    {!! Form::open(['route' => 'email']) !!}
                    {!! Form::submit('Solicita a los gerentes la carga de informacion', ['class' => 'btn btn-primary', 'id' => 'Solicitar']) !!}
                    {!! Form::close() !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @else
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="informacion">
                    <strong><i class="fa fa-check" aria-hidden="true"></i>
                    </strong> Parece que todos tus gerentes han cargado su informacion.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('layouts.errors')
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="text-center">
            <div class="row">
                <div class="col-sm">
                    <table class="table table-hover text-center">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Operaciones actuales</th>
                            <th scope="col">Operaciones anteriores</th>
                            <th scope="col">Variación</th>
                            <th scope="col">% Porcentaje</th>
                            <th scope="col">Boleto</th>
                            <th scope="col">Grupo</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($desgloses as $desglose)
                                <td>{!! $desglose->operacionesactuales !!}</td>
                                <td>{!! $desglose->operacioneshistorico !!}</td>
                                <td>{!! $desglose->variacion !!}</td>
                                <td>{!! $desglose->porcentaje !!}</td>
                                <td>{!! $desglose->tickets !!}</td>
                                <td>{!! $desglose->grupo !!}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <a type="button" class="btn btn-info float-md-left" href="{{ route('desglose.index') }}">Buscador <i
                class="fa fa-search" aria-hidden="true"></i>
        </a>
        <br><br>

        {!! Form::open(['route' => 'reporte', 'class' => 'form-inline']) !!}
        <div class="form-group mb-3">
            <input type="text" disabled readonly class="form-control-plaintext" id="staticEmail2" value="Seleccione fecha reporte">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            {!! Form::text('Fecha', null, ['class' => 'form-control','id'=>'Fecha_pago', 'required']) !!}
        </div>
        {!! Form::submit('Descargar', ['class' => 'form-control btn btn-success']) !!}
        {!! Form::close() !!}


    </div>

    @push('scripts')
        <script type="text/javascript">
            $('#Fecha_pago').datetimepicker({
                format: 'YYYY-MM-DD',
                useCurrent: true,
                sideBySide: true
            })
        </script>
    @endpush

@endsection

<script>
    @push('scripts')
    @endpush
</script>
