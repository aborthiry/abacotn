@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Web Hook
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($webHook, ['route' => ['webHooks.update', $webHook->id], 'method' => 'patch']) !!}

                        @include('web_hooks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection