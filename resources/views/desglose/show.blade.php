@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Buscador</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('layouts.errors')
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['route' => 'buscar']) !!}

                @include('desglose.fields')

                {!! Form::close() !!}
            </div>
            <div class="text-center">
                <div class="row">
                    <div class="col-sm">
                        <table class="table table-hover text-center">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Operaciones actuales</th>
                                <th scope="col">Operaciones 2019</th>
                                <th scope="col">% Porcentaje</th>
                                <th scope="col">Variacion</th>
                                <th scope="col">Boleto</th>
                                <th scope="col">Grupo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($resultados as $desglose)
                                        @if($desglose->operacionesactuales != NULL || $desglose->porcentaje != NULL || $desglose->variacion != NULL || $desglose->grupo != NULL)
                                        <td>{!! $desglose->operacionesactuales !!}</td>
                                        <td>{!! $desglose->operacioneshistorico !!}</td>
                                        <td>{!! $desglose->porcentaje !!}</td>
                                        <td>{!! $desglose->variacion !!}</td>
                                        <td>{!! $desglose->tickets !!}</td>
                                        <td>{!! $desglose->grupo !!}</td>
                                        @else
                                        <td colspan="4"><h4>Sin resultados</h4></td>
                                        @endif

                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a type="button" class="btn btn-info float-md-left" href="{{ route('home') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver

        </a>
    </div>
@endsection
