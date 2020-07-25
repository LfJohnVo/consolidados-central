@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Operacion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($operacion, ['route' => ['operacions.update', $operacion->id], 'method' => 'patch']) !!}

                        @include('operacions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection