<?php

namespace App\Http\Controllers;

use App\Models\Account\Account;
use App\Models\Account\Departamento;
use App\Models\Account\Municipio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function municipio(Request $request)
    {
        if($request->ajax()){
            return response()->json([
               'municipios'=>Municipio::where('departamento_id_departamento',$request->id)->get()
            ]);
        }


        return view('account.new_account');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_profile()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $account = Account::where('users_id',$user->id)->first();
        $departamentos = Departamento::all();
        $muni = Municipio::where('departamento_id_departamento',$account->departamento_id_departamento)->get();
        return view('account.profile_account',compact('departamentos','account','user','muni'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar_cuenta_nueva(Request $request)
    {
        User::where('id',Auth::user()->id)->update(['first_use'=>'No']);
        Account::create([
           'dpi'=>$request->dpi,
           'nombre_completo'=>$request->nombre,
           'nit'=>$request->nit,
           'celular'=>$request->celular,
           'telefono'=>$request->telefono,
           'departamento_id_departamento'=>$request->departamento,
           'municipio_id_municipio'=>$request->munnicipio,
           'users_id'=>Auth::user()->id
        ]);
        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return void
     */
    public function update_user_acc(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
