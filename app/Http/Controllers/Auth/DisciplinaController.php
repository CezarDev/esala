<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Disciplina;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
//use App\Http\Controllers\Auth\Request;
use Illuminate\Http\Request;


class DisciplinaController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' =>        ['required', 'string', 'max:255'],
            'nome_disciplina'    =>        ['required', 'string', 'max:255'  ],
            'horario' =>        ['required', 'string', 'max:60'],         
            'sala'    =>        ['required', 'string', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Disciplina
     */
    protected function create(array $data)
    {
        return Disciplina::create([
            'user_id'            => $data['user_id'],
            'nome_disciplina'    => $data['nome_disciplina'],
            'horario'            => $data['horario'],
            'sala'               => $data['sala'],
        ]);
    }

    public function index(){
        return view ('auth\disciplinas');
    }

    public function listarDisciplina(){
        $lista = Disciplina::all();
        return view('auth/lista-disciplina', ['disciplinas' => $lista]);
    }

    public function store(Request $request){

        Disciplina::create($request->all());

        return redirect("disciplina/lista")->with("message", "Disciplina cadastrada com sucesso");
    }

}



