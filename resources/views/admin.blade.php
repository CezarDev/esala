@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Bem vindo ADMIN</div>

                <div class="icones">
                    
                <a href="{{ url('admin/todos') }}"><img height="150px"src="imagens\todosProfessores.png"alt="150px"></a>
            
            
                 <a href="{{ url('admin/disciplina/lista') }}"><img height="155px"src="imagens\disciplinas.png"alt="150px"></a>
             
             </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    

.icones{
padding-left:1.5em; 
padding-bottom: 2em;
padding-top: 2em;
display: inline;
overflow: hidden;

}


.profes:hover img{
    transform: translateY(-50px); 
    color:orange;
    display: inline;
}.disci:hover img{
    transform: translateY(-50px); 
    display: inline;
}

</style>