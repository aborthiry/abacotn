@extends('layouts.app')

    @section('content')
    <div class="container">
    <section class="content-header">
        <h1 class="pull-left">Tiendas</h1>
        <h1 class="pull-right">
           
        </h1>
    </section>
    <div class="content">

        <div class="clearfix"></div>

        @include('flash.message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('productos.table')
            </div>
        </div>
        <div class="text-center">



        </div>
    </div>
</div>
@endsection