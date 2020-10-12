@extends('layouts.app')

@section('content')
<div class="container">
    <section class="content-header">
        <h1>
            Tienda
        </h1>
   </section>
   <div class="content">
       
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tienda, ['route' => ['tiendas.update', $tienda->id], 'method' => 'patch']) !!}

                        @include('tiendas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection