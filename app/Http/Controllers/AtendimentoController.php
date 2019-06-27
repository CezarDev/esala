<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Dado;
use App\User;
use App\Atendimento; 
use App\Pesquisa; 
class AtendimentoController extends Controller
{
     function index(){

     	$lista = DB::table('users') 
     	->groupBy('nome')
     	->get();

        $cursos = DB::table('pesquisas') 
        ->groupBy('curso')
        ->get();
     	// $modalidades = $lista->modalidade;
     	// $cursos 	 = $lista->curso;
     	// $turmas 	 = $lista->turma;

     	return view('atendimento' , ['lista' => $lista, 'cursos' => $cursos]);

    }

    function fetch(Request $request){

    	$select = $request->get('select');
    	$value = $request->get('value');
    	$dependent = $request->get('dependent');
    	$data = DB::table('users')->where($select, $value)->groupBy($dependent)->get();

    	$output = '<option value="">Select '.ucfirst($dependent).'</option>';
    	foreach ($data as $row) {
    		$output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
    	}
    	echo $output;
    }

    function create(array $data){
    	return Atendimento::create([
            'nome'       => $data['nome'],
            'data'       => $data['data'],
            'inicio'       => $data['inicio'],
            'termino'       => $data['termino'],
        ]);
    }



    function salvar(Request $request){

    Atendimento::create($request->all());
    return redirect("/")->with("mensagem", "Atendimento registrador com sucesso");
    }


}