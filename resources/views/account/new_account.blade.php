@extends('adminlte::page')
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
            <input type="hidden" value="{{Auth::user()->id}}">
            <div class="form-group">
                <label>DPI: </label>
                <input type="text" name="dpi" maxlength="13" class="form-control number" placeholder="00000000000000" required>
            </div>
            <div class="form-group">
                <label>Nombre completo: </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre completo" required>
            </div>
            <div class="form-group">
                <label>NIT</label>
                <input type="text" name="nit" maxlength="" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Celular</label>
                <input type="text" name="celular" maxlength="8" class="form-control number" placeholder="12345678" required>
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" name="telefono" maxlength="8" class="form-control number" placeholder="12345678" required>
            </div>
            <div class="form-group">
                <label>Departamento</label>
                <select type="text" name="departamento" id="departamento" class="form-control" required>
                    @foreach($departamentos as $departamento)
                        <option value="{{$departamento->id_departamento}}">{{$departamento->nombre_departamento}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Municipio</label>
                <select type="text" name="munnicipio" id="municipio" class="form-control" required>
                </select>
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
