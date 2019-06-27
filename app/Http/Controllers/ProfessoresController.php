<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use PDF;

class ProfessoresController extends Controller
{

public function index(){
/*
$professores = disciplinas::select('cidades.*', 'estados.id as est_id', 'estados.codigoibge as est_codigoibge')
                            ->join('estados', 'estados.id', '=', 'cidades.estado_id')
                            ->where('cidades.nome', 'LIKE', Input::get('term') . '%')
                            ->orderBy('cidades.nome', 'asc')
                            ->orderBy('estados.nome', 'asc')
                            ->get();
*/


	$professores = DB::table('users')
            ->join('disciplinas', 'users.id', '=', 'user_id')
            ->select('nome', 'horario_permanencia','nome_disciplina','horario','sala','email')
            ->orderBy('nome', 'asc')
            ->get();
            return view('professores', ['professores' => $professores]);	
	
}

/*
public function get_dados(){
 $dados = DB::table('users')
            ->join('disciplinas', 'users.id', '=', 'user_id')
            ->select('nome', 'horario_permanencia','nome_disciplina','horario','sala','email')
            ->get();
            return $dados;

}
*/
public function pdf()
{
    $professores = DB::table('users')
            ->join('disciplinas', 'users.id', '=', 'user_id')
            ->select('nome', 'horario_permanencia','nome_disciplina','horario','sala','email')
            ->get();
 
   
    $pdf = PDF::loadView('professores',['professores'=> $professores])->setPaper('a4', 'landscape');
	return $pdf->download();
}
/*
public function df(){
	$pdf = \App::make('dompdf.wrapper');
	$pdf->loadHTML($this->convert_dados_to_html());
	$pdf->stream();
}


public function convert_dados_to_html(){
	$dados = $this->get_dados();
	$output = '
	<h3 align="center">Professores Cadastrados</h3>
	<table width="100%" style="border-collapse:collapse; border: 0px;">
	<tr>
		<th style="border: 1px solid;
		padding:12px;" width="20%">Nome</th>
		<th style="border: 1px solid;
		padding:12px;" width="20%">Disciplina</th>
		<th style="border: 1px solid;
		padding:12px;" width="15%">Horario</th>
		<th style="border: 1px solid;
		padding:12px;" width="30%">Sala</th>
		<th style="border: 1px solid;
		padding:12px;" width="30%">Permanencia</th>
		<th style="border: 1px solid;
		padding:12px;" width="20%">Email</th>
	</tr>
	';
	 foreach ($dados as $dado) {
	 	$output.='
	 	<tr>
	 		<td style="border: 1px solid;
	 		padding:12px;">'.$dado->nome.'</td>
	 		<td style="border: 1px solid;
	 		padding:12px;">'.$dado->nome_disciplina.'</td>
	 		<td style="border: 1px solid;
	 		padding:12px;">'.$dado->horario.'</td>
	 		<td style="border: 1px solid;
	 		padding:12px;">'.$dado->sala.'</td>
	 		<td style="border: 1px solid;
	 		padding:12px;">'.$dado->horario_permanencia.'</td>
	 		<td style="border: 1px solid;
	 		padding:12px;">'.$dado->email.'</td>
	 	</tr>	
	 	';
	 }
	 $output .='</table>';
	 return $output;
}
*/
}