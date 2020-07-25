@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Gerente
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   @foreach($gerentes as $gerente)
                   {!! Form::model($gerente, ['route' => ['gerentes.update', $gerente->id], 'method' => 'patch']) !!}

                        @include('gerentes.fields')

                   {!! Form::close() !!}
                   @endforeach
               </div>
           </div>
       </div>
   </div>
@endsection
