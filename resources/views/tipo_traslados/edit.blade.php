@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Traslado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoTraslado, ['route' => ['tipoTraslados.update', $tipoTraslado->id], 'method' => 'patch']) !!}

                        @include('tipo_traslados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection