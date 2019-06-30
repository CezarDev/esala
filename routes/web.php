<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('/professores', function () {
   return view('professores');
});

Route::get('/logados', function () {
	return view('logados');
});

Route::get('/teste', function () {
dd(auth()->user());

});

// Route::get('/pesquisa', function () {
//     return view('pesquisa');
// });

Route::get('/nova/disciplina', function () {
    return view('disciplinas');
});

Route::get('/disciplina/lista', function(){
	return view('lista-disciplina');

});

// Route::get('/dados', function(){
// 	return view('dados');

// });

//Route::get('/login', 'Auth\LoginController@pegausuario');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lista/atendimento', 'HomeController@atendimento')->name('lista.atendimento');
//Route::get('/home', 'HomeController@pegarProfessores');

	//Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
		Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//----------------------------------------------------------------------------------------
	//Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function()
//require 'auth/admin.php';


Route::prefix('admin')->group(function(){
	
	Auth::routes(); 
			Route::get('/logar', 'Auth\AdminLoginController@mostrarLoginForm')->name('admin.login');
		 	
		 	Route::post('/logar', 'Auth\AdminLoginController@logar')->name('admin.login.submit');

		 
		//if (Auth::guest()) return Redirect::guest('admin.login');
	
		
	   Route::middleware(['auth:admin'])->group(function () {
	    	 
	    	Route::get('/', 'AdminController@index')->name('admin.dashboard');
		
			Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

			Route::get('/todos', 'AdminController@pegarProfessores');

			Route::get('/disciplina/lista', 'AdminController@listarDisciplina');

			Route::get('/nova/disciplina', 'AdminController@cadastrarDisciplina')->name('nova-disciplina');
			
			Route::post('/disciplina/salvar', 'AdminController@store');

			Route::get('/novo/professor', 'AdminController@cadastrarProfessor');

			Route::post('/professor/salvar', 'AdminController@storeProf');

			Route::post('/alterar/{id}', 'AdminController@alterar');

			Route::post('/alterar/disciplina/{id}', 'AdminController@alterarDisc');

			Route::get('admin/professor/{id}/editar', 'AdminController@editar');

			Route::get('admin/professor/{id}/excluir', 'AdminController@excluir');

			Route::get('/disciplina/admin/disciplina/{id}/excluir', 'AdminController@excluirDisc');

			Route::get('/disciplina/admin/disciplina/{id}/editar', 'AdminController@editarDisciplina');

			Route::post('/disciplina/salvar', 'AdminController@storeDisc');

			Route::get('/dados','GraficoController@index')->name('dados');

			
	
	    });


});

//Route::get('login', 'Auth\LoginController@showLoginForm');
//-----------------------------------------------------------------------------------------

//Router::get('/professores', 'ProfessoresController@indexo');


Route::get('/download', 'ProfessoresController@pdf');
Route::get('/lista/download', 'HomeController@pdf');
Route::get('/lista/professores', 'ProfessoresController@listaProfessores');

Route::get('/professores', 'ProfessoresController@index');

Route::get('/logados', 'LogadosController@index');

//Route::get('/disciplina/lista', 'Auth\DisciplinaController@listarDisciplina');

Route::get('/pesquisa', 'PesquisaController@index');
Route::post('/pesquisa/fetch', 'PesquisaController@fetch')->name('pesquisa.fetch');
Route::post('/pesquisa/salvar', 'PesquisaController@salvar')->name('pesquisa.salvar');

Route::get('/atendimento', 'AtendimentoController@index');
Route::post('/atendimento/fetch', 'AtendimentoController@fetch')->name('atendimento.fetch');
Route::post('/atendimento/salvar', 'AtendimentoController@salvar')->name('atendimento.salvar');

Route::get('/contar','GraficoController@contaCurso');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::post('disciplina', "Auth\DisciplinaController@store")
