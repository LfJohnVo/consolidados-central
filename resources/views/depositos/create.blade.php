@extends('layouts.gerentes')

@section('content')
    <section class="content-header">
        <h1>
            Deposito
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'depositos.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('depositos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
