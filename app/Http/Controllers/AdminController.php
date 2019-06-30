<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Disciplina;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' =>                ['required', 'string', 'max:255'],
            'horario_permanencia' => ['required', 'string', 'max:60'],         
            'email' =>               ['required', 'string', 'max:255', 'unique:users'],
            'password' =>            ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nome'                => $data['nome'],
            'horario_permanencia' => $data['horario_permanencia'],
            'email'               => $data['email'],
            'password'            => Hash::make($data['password']),
        ]);

        \Session::flash('mensagem', '{{<strong>Professor Cadastrado!!!');

        return redirect("admin/todos")->with("message", "Professor cadastrado com sucesso");
    }

    public function storeProf(Request $request){

        User::create($request->all());

        \Session::flash('mensagem', '{{<strong>Professor Cadastrado!!!');

        return redirect("admin/todos")->with("message", "Professor cadastrado com sucesso");
    }


    public function editar($id){
        //var_dump($id);
        $user = User::findOrFail($id);
       //dd($user);
        return view('auth/editar-professor')->with(['user' => $user]);
    }

    public function editarDisciplina($id){
        //var_dump($id);
        $user = Disciplina::findOrFail($id);
       //dd($user);
        return view('auth/editar-disciplina')->with(['user' => $user]);
    }

    /////// RECEBE O ID DO PROFESSORE VALIDA OS DADOS E ATUALIZA
    public function alterar(Request $request, $id){
         $data = $request->all();
         
           $dados = Validator::make($data, [
            'nome' =>                ['required', 'string', 'max:255'],
            'horario_permanencia' => ['required', 'string', 'max:60'],         
            'email' =>               ['required', 'string', 'max:255', 'unique:users'],
            'password' =>            ['required', 'string', 'min:8', 'confirmed'],
        ]);
       
            $user = User::findOrFail($id);

            $user->update([
            'nome'                => $data['nome'],
            'horario_permanencia' => $data['horario_permanencia'],
            'email'               => $data['email'],
            'password'            => Hash::make($data['password']),
            ]);
            
            if($user){
            return redirect("admin/todos")->with("mensagem", "Cadastro alterado com sucesso");
            }           
            else {
                return back()->with("erromsg", "Erro ao alterar cadastro ");
            }     
    }



public function alterarDisc(Request $request, $id){
         $data = $request->all();
         
           $dados = Validator::make($data, [
            'nome_disciplina' =>                ['required', 'string', 'max:255'],
            'horario' => ['required', 'string', 'max:60'],         
            'sala' =>               ['required', 'string', 'max:255'],
        ]);
       
            $user = Disciplina::findOrFail($id);

            $user->update([
            'nome_disciplina'                => $data['nome_disciplina'],
            'horario' => $data['horario'],
            'sala'               => $data['sala'],
            ]);
            
            if($user){
            return redirect("admin/disciplina/lista")->with("mensagem", "Disciplina alterada com sucesso");
            }           
            else {
                return back()->with("erromsg", "Erro ao alterar disciplina ");
            }     
    }


    public function excluir(Request $request, $id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect("admin/todos")->with("mensagem", "Cadastro excluído com sucesso");
    }

     public function excluirDisc(Request $request, $id){
        $user = Disciplina::findOrFail($id);
        $user->delete();
        return redirect("admin/disciplina/lista")->with("mensagem", "Disciplina excluída com sucesso");
    }

}
