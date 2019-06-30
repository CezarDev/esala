@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-10">
            <div class="card">
                
                <div class="card-header"><strong>Todos professores cadastrados</strong></div>

                <div class="card-body" align="right">
                    <a href="{{url('/admin/novo/professor')}}" class="btn btn-success">Novo Professor</a>

                    <a href="{{url('/admin')}}" class="btn btn-secondary">Voltar</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                  
                    <div class="panel-body">
                        @if(Session::has('mensagem'))
                        <div class="alert alert-success">{{Session::get('mensagem')}}</div>
                        @endif
                        @if(Session::has('erromsg'))
                        <div class="alert alert-danger">{{Session::get('erromsg')}}</div>
                        @endif

                        <table class="table">
                            <th>Nome</th>
                            <th>Local Permanência</th>
                            <th>Horário Permanência</th>
                            <th>Email</th>                            
                            <th>Ações</th>
                            <tbody>                                
                                @foreach($professores as $user)
                                <tr>
                            <td><strong>{{ $user->nome }}</strong></td>
                            <td>{{ $user->local_permanencia }}</td>
                            <td>{{ $user->horario_permanencia }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <p class="bt">
                                <a href="admin/professor/{{$user->id }}/editar"class="btn btn-outline-warning btn-sm bt"><strong>Alterar</strong></a>
                                <a href="admin/professor/{{$user->id }}/excluir"class="btn btn-outline-danger btn-sm bt" onclick=" return confirm('Deseja excluir?')"><strong>Excluir</strong></a>
                                </p>
                            </td>
                                </tr>
                                @endforeach
                                
                            </tbody>                   
                        </table>
                    </div>

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
   .bt{
    margin-bottom:2px;
    margin-left: 2px;
    display: flex;
    }
</style>