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
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
