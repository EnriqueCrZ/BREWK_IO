@extends('adminlte::page')
@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    <style>
        .row {
            margin-left: 0;
            display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;
        }
        .col,.no-gutters>[class*=col-]{padding-right:0;padding-left:0}.col,.col-1,.col-10,.col-11,.col-12,.col-2,.col-3,.col-4,.col-5,.col-6,.col-7,.col-8,.col-9,.col-auto,.col-lg,.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-auto,.col-md,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-auto,.col-sm,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-auto,.col-xl,.col-xl-1,.col-xl-10,.col-xl-11,.col-xl-12,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-6,.col-xl-7,.col-xl-8,.col-xl-9,.col-xl-auto{position:relative;width:100%;padding-right:15px;padding-left:15px}.col{-ms-flex-preferred-size:0;flex-basis:0;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-auto{-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:100%}.col-1{-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-2{-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-3{-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-4{-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-5{-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-6{-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-7{-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-8{-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-9{-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-10{-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-11{-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-12{-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}
        .form-control-plaintext{display:block;width:100%;padding-top:.375rem;padding-bottom:.375rem;margin-bottom:0;line-height:1.5;color:#212529;background-color:transparent;border:solid transparent;border-width:1px 0}.form-control-plaintext.form-control-lg,.form-control-plaintext.form-control-sm{padding-right:0;padding-left:0}
    </style>
@stop
@section('content')

        <h2>Viaje </h2>
    <div class="row">
        <div class="col col-5">
            <div class="form-group">
                <label>Itinerario</label>
                 <input value="{{$itinerario->id_itinerario}}" class="form-control-plaintext">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label>Hora de salida: </label>
            <input type="text" class="form-control-plaintext" id="hora_salida" value="{{$itinerario->hora_salida}}">
        </div>
        <div class="col-5">
            <label>Bus</label>
            <input type="text" class="form-control-plaintext" id="bus" value="{{$itinerario->bus_placa}}">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Origen</label>
            <input type="text" class="form-control-plaintext" id="origen" value="{{$origen_f}}">
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-6">
            <label for="dpi">Su Destino </label>
            <input type="text" id="destino_usuario" name="destino_usuario" class="form-control-plaintext" value="{{$destino_f}}">

        </div>
        <div class="col-4">
            <label>Precio: </label>
            <input type="text" name="precio" id="precio" class="form-control-plaintext" value="{{$rutaFinal->costo}}">
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label>Motivo del viaje</label>
                <input type="text" name="motivo" maxlength="75" class="form-control-plaintext" value="{{$detalles->descripcion}}">
            </div>
        </div>
    </div>
@stop
