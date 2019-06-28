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
       $user = auth()->user();
        
        return view('home' , ['user' => $user]);
    }

    public function atendimento(){

            $usuarioLogado = auth()->user();
            $usuarioId = $usuarioLogado->id;

            $atendimentos = DB::table('atendimentos')
            ->select('data', 'inicio', 'termino','aluno','curso')
            ->where('user_id','=', $usuarioId)
            ->get();
            return view('lista-atendimentos', ['atendimentos' => $atendimentos]);

        

    }

    public function pegarProfessores(){
        $userio = auth()->user();
        $user = $userios->id;
        return view('home' , ['user' => $user]);
    }

    public function pdf()
{
    
            $usuarioLogado = auth()->user();
            $usuarioId = $usuarioLogado->id;

            $atendimentos = DB::table('atendimentos')
            ->select('data', 'inicio', 'termino','aluno','curso')
            ->where('user_id','=', $usuarioId)
            ->get();
            return view('lista-atendimentos', ['atendimentos' => $atendimentos]);
 
   
    $pdf = PDF::loadView('lista-atendimentos',['atendimentos'=> $atendimentos])->setPaper('a4', 'landscape');
    return $pdf->download();
}
      

}
