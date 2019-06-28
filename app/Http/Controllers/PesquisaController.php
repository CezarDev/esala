<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Dado;
class PesquisaController extends Controller
{
     function index(){

     	$lista = DB::table('pesquisas') 
     	->groupBy('modalidade')
     	->get();
     	// $modalidades = $lista->modalidade;
     	// $cursos 	 = $lista->curso;
     	// $turmas 	 = $lista->turma;

     	return view('pesquisa' , ['lista' => $lista]);

    }

    function fetch(Request $request){

    	$select = $request->get('select');
    	$value = $request->get('value');
    	$dependent = $request->get('dependent');
    	$data = DB::table('pesquisas')->where($select, $value)->groupBy($dependent)->get();

    	$output = '<option value="">Selecione '.ucfirst($dependent).'</option>';
    	foreach ($data as $row) {
    		$output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
    	}
    	echo $output;
    }

    function create(array $data){
    	return Dado::create([
            'modalidade'       => $data['modalidade'],
            'curso'    		   => $data['curso'],
            'turma'            => $data['turma'],
        ]);
    }



    function salvar(Request $request){

    Dado::create($request->all());
    return redirect("/")->with("mensagem", "Obrigado por participar!!");
    }


}