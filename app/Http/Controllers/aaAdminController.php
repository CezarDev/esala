<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Disciplina;
use Auth;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('admin');
    }

    public function pegarProfessores(){
        $professores = User::get();
        return view('todosProfessores' , ['professores' => $professores]);
        //return printf("format");
    }

     public function listarDisciplina(){
        $lista = Disciplina::all();
        return view('auth/lista-disciplina', ['disciplinas' => $lista]);
    }

    public function pegaAu(){
        $user = auth()->user();
        return $user;
    }

    public function cadastrarDisciplina(){
        return view ('auth/nova-disciplina');
    }

    public function store(Request $request){

        Disciplina::create($request->all());

        return redirect("admin/disciplina/lista")->with("message", "Disciplina cadastrada com sucesso");
    }

    public function cadastrarProfessor(){
        return view('auth/novo-professor');
    }

    public function storeProf(Request $request){

         User::create([
            'nome'                => $data['nome'],
            'horario_permanencia' => $data['horario_permanencia'],
            'email'               => $data['email'],
            'password'            => Hash::make($data['password']),
        ]);

         return redirect("todosProfessores");

    }

}
