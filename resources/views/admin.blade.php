@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header"><strong>Bem vindo Admin</strong></div>

                <div class="icones">
                 <div class="prof">   
                <a href="{{ url('admin/todos') }}" class="color"><img height="150px"src="imagens\todosProfessores.png"alt="150px"></a>
                </div>
                <div class="disci">
                 <a href="{{ url('admin/disciplina/lista') }}"><img height="159px"src="imagens\disciplinas.png"alt="150px"></a>
                 </div>
                 <div class="graf">
                 <a href="{{ url('admin/dados') }}"><img height="155px"src="imagens\graficos.png"alt="150px"></a>
                    </div>

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
margin: 5px;
/*overflow: hidden;*/
/*transform: translateY(-50px);*/
}

.prof{
   /* transform: translateY(-50px); 
    color:orange;
    display: inline;*/
    /*padding: 5px;*/
    display: inline;
    padding: 2em;
}
.disci{
  /* transform: translateY(-50px); */
    display: inline;
    padding: 2em;
    

}

.graf{
    border-radius: 5px;
    display: inline;
    padding: 3em;
}

</style>