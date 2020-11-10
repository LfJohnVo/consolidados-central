@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Promesa
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($promesa, ['route' => ['promesas.update', $promesa->id], 'method' => 'patch']) !!}

                        @include('promesas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection