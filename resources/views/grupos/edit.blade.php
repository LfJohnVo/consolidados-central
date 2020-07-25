@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Grupo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @foreach($grupos as $grupo)
                        {!! Form::model($grupo, ['route' => ['grupos.update', $grupo->id_grupos], 'method' => 'patch']) !!}

                        @include('grupos.fields')

                        {!! Form::close() !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
