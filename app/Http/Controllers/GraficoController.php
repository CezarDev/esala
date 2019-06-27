<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\Grafico;

use DB;

class GraficoController extends Controller
{
    public function index(){

    	$dados = DB::table('dados')
    	->select('modalidade', 'curso', 'turma')
    	->get();   

    	$qtdMecanica = DB::table('dados')
		->select('curso')
		->where('curso', 'LIKE', "Mecânica")
		->count();

   		 return view('dados', ['dados' => $dados, 'qtdMecanica' => $qtdMecanica]);
	}
    //$grafico = new Grafico;

	public function contaCurso(){

		$qtdMecanica = DB::table('dados')
		->select('curso')
		->where('curso', 'LIKE', "Mecânica")
		->count();

		return view('contar', ['qtdMecanica' => $qtdMecanica]);



	}



}
