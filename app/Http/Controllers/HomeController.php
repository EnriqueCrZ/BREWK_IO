<?php

namespace App\Http\Controllers;

use App\Models\Account\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->first_use != 'Yes'){
            return view('home');
        }else{
            $departamentos = Departamento::all();
            return view('account.new_account',compact('departamentos'));
        }
    }
}
