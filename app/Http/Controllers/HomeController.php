<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Atendimento;
use DB;

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
        if (auth()->user()) {
            $usuario = auth()->user();
            $usuario->logado = 1;
            $usuario->save();
           // print_r($usuario);
        }
        return view('home');
    }

    public function atendimento(){

        $atendimentos = DB::table('users')
            ->join('atendimentos', 'atendimentos.nome', 'LIKE', 'users.nome')
            ->select('data', 'inicio', 'termino','aluno','curso')
            ->get();
            return view('lista-atendimentos', ['atendimentos' => $atendimentos]);

    }

}
