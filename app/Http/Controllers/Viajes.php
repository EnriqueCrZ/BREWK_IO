<?php

namespace App\Http\Controllers;

use App\Models\Account\Account;
use App\Models\Viaje\Itinerario;
use App\Models\Viaje\Pago\Detalle_viaje;
use App\Models\Viaje\Pago\Pago;
use App\Models\Viaje\Ruta\Destino;
use App\Models\Viaje\Ruta\Lugar;
use App\Models\Viaje\Ruta\Origen;
use App\Models\Viaje\Ruta\Ruta;
use App\Models\Viaje\Transbordo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Viajes extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function getDate(){
        return new Carbon;
    }

    public function showView(){
        $itinerarios = Itinerario::all();
        return view('viajes.reservar',compact('itinerarios'));
    }

    public function getItinerario(Request $request){
        if($request->ajax()){
            $itinerario = Itinerario::where('id_itinerario',$request->id)->first();
            $itinerarios = Itinerario::where('bus_placa',$itinerario->bus_placa)->orderBy('hora_salida','desc')->first();
            $itinerarios2 = Itinerario::where('bus_placa',$itinerario->bus_placa)->get();
            $ruta = Ruta::where('id_ruta',$itinerario->ruta_id_ruta)->first();
            $dest_disp = DB::table('itinerario')
                ->join('ruta','ruta.id_ruta','=','itinerario.ruta_id_ruta')
                ->join('destino','ruta.destino_id_destino','=','destino.id_destino')
                ->join('lugar','destino.lugar_id_lugar','=','lugar.id_lugar')
                ->where('itinerario.bus_placa','=',$itinerario->bus_placa)
                ->select('lugar.descripcion as lugar','destino.*','ruta.*')
                ->get();
            $rutafinal= Ruta::where('id_ruta',$itinerarios->ruta_id_ruta)->first();
            $origen = Origen::where('id_origen',$ruta->origen_id_origen)->first();
            $destino = Destino::where('id_destino',$rutafinal->destino_id_destino)->first();
            return response()->json([
                'hora_salida'=>$itinerario->hora_salida,
                'bus'=>$itinerario->bus_placa,
                'origen'=>DB::table('lugar')->where('id_lugar','=',$origen->lugar_id_lugar)->value('descripcion'),
                'destino'=>DB::table('lugar')->where('id_lugar','=',$destino->lugar_id_lugar)->value('descripcion'),
                'destinos_disp'=>$dest_disp
            ]);
        }
    }

    public function getPrecio(Request $request){
        if($request->ajax()){
            return response()->json([
                'precio'=>Ruta::where('id_ruta',$request->id)->value('costo')
            ]);
        }
    }

    public function store(Request $request){
        $account = Account::where('users_id',Auth::user()->id)->first();
        $itinerario = Itinerario::where('id_itinerario',$request->itinerario)->first();
        $pago = new Pago();
           $pago->fecha = self::getDate();
           $pago->account_dpi = $account->dpi;
           $pago->itinerario_id_itinerario = $request->itinerario;
           $pago->save();
        Detalle_viaje::create([
            'descripcion' => $request->motivo,
            'pago_id_transaccion' => $pago->id_transaccion
        ]);
        Transbordo::create([
            'ruta_id_ruta'=>$request->destino_usuario,
            'itinerario_id_itinerario'=>$request->itinerario,
            'bus_placa'=>$itinerario->bus_placa
        ]);
        return route('home');
    }

    /*public function viajes(){
        $account = Account::where('users_id',Auth::user()->id)->first();
        $pago = Pago::where('account_dpi',$account->dpi)->first();
        $itinerario = Itinerario::where('id_itinerario',$pago->itinerario_id_itinerario)->first();
        $ruta = Ruta::where('id_ruta',$itinerario->ruta_id_ruta)->first();
        $origen = Origen::where('id_origen',$ruta->origen_id_origen)->first();
        $viajes = DB::table('pago')
            ->join('itinerario','pago.itinerario_id_itinerario','=','itinerario.id_itinerario')
            ->join('transbordo','itinerario.id_itinerario','=','transbordo.itinerario_id_itinerario')
            ->join('ruta','ruta.id_ruta','=','transbordo.ruta_id_ruta')
            ->join('destino','ruta.destino_id_destino','=','destino.id_destino')
            ->join('lugar','destino.lugar_id_lugar','=','lugar.id_lugar')
            ->join('detalle_viaje','pago.id_transaccion','=','detalle_viaje.pago_id_transaccion')
            ->where('pago.account_dpi','=',$account->dpi)
            ->select('itinerario.*','pago.*','lugar.descripcion as destino_usuario','ruta.costo as precio','detalle_viaje.descripcion as motivo')
            ->get();

        return view('viajes.viajes',compact('viajes'));
    }*/

    public function viajes(){
        $account = Account::where('users_id',Auth::user()->id)->first();
        $pago = Pago::where('account_dpi',$account->dpi)->first();
        $detalles = Detalle_viaje::where('pago_id_transaccion',$pago->id_transaccion)->first();
        $itinerario = Itinerario::where('id_itinerario',$pago->itinerario_id_itinerario)->first();
        $transbordo = Transbordo::where('itinerario_id_itinerario','=',$pago->itinerario_id_itinerario)->first();
        $ruta = Ruta::where('id_ruta',$itinerario->ruta_id_ruta)->first();
        $rutaFinal = Ruta::where('id_ruta',$transbordo->ruta_id_ruta)->first();
        $origen = Origen::where('id_origen',$ruta->origen_id_origen)->first();
        $destino = Destino::where('id_destino',$rutaFinal->destino_id_destino)->first();
        $origen_f = DB::table('lugar')->where('id_lugar','=',$origen->lugar_id_lugar)->value('descripcion');
        $destino_f = DB::table('lugar')->where('id_lugar','=',$destino->lugar_id_lugar)->value('descripcion');

        return view('viajes.viajes',compact('pago','itinerario','origen_f','destino_f','rutaFinal','detalles'));

    }
}
