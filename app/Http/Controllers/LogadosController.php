<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Model\Access;
//use Auth;
//use Session;

class LogadosController extends Controller
{
    
  public function index(){

  			$logados = DB::table('users')
            ->join('accesses', 'users.id', '=', 'user_id')
            ->select('nome', 'local_permanencia', 'horario_permanencia', 'email')
            ->orderBy('nome','asc')
            ->get();
            return view('logados', ['logados' => $logados]);

            	// ->join('contacts', 'users.id', '=', 'contacts.user_id')



    	//$professores = User::get;
    	// $logados = User::select('nome','horario_permanencia', 'email')->where('nome','horario_permanencia', 'email',Auth::user()->nome,Auth::user()->horario_permanencia,Auth::user()->email);
    	//$idlogado = Auth::user()->id; 	
  		//$logados  = Auth::user();
  		//compact('logados'); 	
  		//$logados = Session::all();
  		//$logados=compact(Auth::user());
		//$nome = Auth::user()->nome;
		//$horario_permanencia = Auth::user()->horario_permanencia;
		//$email = Auth::user()->email;
		//$logados = [$nome,$horario_permanencia,$email];
			//$idlogado = Auth::user()->id;
  			//$logados = User::select('nome','horario_permanencia', 'email')->where('id','$idlogado');
  			//compact($logados);
  			 //  	return view('logados', ['logados' => $logados]);

  		}
   	



	}



