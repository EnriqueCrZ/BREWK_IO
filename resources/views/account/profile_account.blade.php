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
    <div class="p-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('new.account')}}" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-6">
                    <label>Usuario: </label>
                    <input type="text" id="user_name" name="user_name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="col-6">
                    <label>Correo: </label>
                    <input type="text" readonly class="form-control-plaintext" value="{{$user->email}}">
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-4">
                    <label for="dpi">DPI: </label>
                    <input type="text" id="dpi" name="dpi" maxlength="13" class="form-control number" placeholder="00000000000000" value="{{$account->dpi}}" required>
                </div>
                <div class="col-8">
                    <label>Nombre completo: </label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre completo" value="{{$account->nombre_completo}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col col-4">
                    <div class="form-group">
                        <label>NIT</label>
                        <input type="text" name="nit" maxlength="" class="form-control" value="{{$account->nit}}" required>
                    </div>
                </div>
                <div class="col col-4">
                    <div class="form-group">
                        <label>Celular</label>
                        <input type="text" name="celular" maxlength="8" class="form-control number" placeholder="12345678" value="{{$account->celular}}" required>
                    </div>
                </div>
                <div class="col col-4">
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" name="telefono" maxlength="8" class="form-control number" placeholder="12345678" value="{{$account->telefono}}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-5">
                    <div class="form-group">
                        <label>Departamento</label>
                        <select type="text" name="departamento" id="departamento" class="form-control"  required>
                            @foreach($departamentos as $departamento)
                                <option @if($account->departamento_id_departamento == $departamento->id_departamento) selected @endif value="{{$departamento->id_departamento}}">{{$departamento->nombre_departamento}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-7">
                    <div class="form-group">
                        <label>Municipio</label>
                        <select type="text" name="munnicipio" id="municipio" class="form-control" required>
                            @foreach($muni as $m)
                                <option @if($account->municipio_id_municipio == $m->id_municipio) selected @endif value="{{$m->id_municipio}}">{{$m->nombre_municipio}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

@stop
@section('js')
    <script>
        var input_number = $('.number');
        input_number.on("keyup",function(event){
            var selection = window.getSelection().toString();
            if(selection !== ''){
                return;
            }
            if($.inArray(event.keyCode, [38,40,37,39]) !== -1 ){
                return;
            }
            var $this = $(this);
            var input = $this.val();

            input = input.replace(/[\D\s._\-]+/g,"");
            input = input ? parseInt(input,10) : 0;

            $this.val(input);
        });
        $('#departamento').on('change',e=>{
            let data = $('#departamento').val();
            $('#municipio').empty();
            $.ajax({
                url: '{{route('municipio')}}',
                data: {'id': data},
                success: data => {
                    console.log(data.municipios.length);
                    if(data.municipios.length>0){
                        data.municipios.forEach(municipio =>
                            $('#municipio').append('<option value="'+municipio.id_municipio+'">'+municipio.nombre_municipio+'</option>')
                        )
                    }else{
                        $('#municipio').append('<option value="0">No disponible aún</option>')
                    }
                }
            })
        })
    </script>
    @stop
