@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Disciplinas Cadastradas</div>

                <div class="card-body" align="right">
                     @if(Session::has('mensagem'))
                        <div class="alert alert-success">{{Session::get('mensagem')}}</div>
                        @endif
                        @if(Session::has('erromsg'))
                        <div class="alert alert-danger">{{Session::get('erromsg')}}</div>
                        @endif

                     <a href="{{url('/admin/nova/disciplina')}}"class="btn btn-success">Nova Disciplina</a>

                     <a href="{{url('/admin')}}" class="btn btn-secondary">Voltar</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                          

                    <div class="panel-body">
                        <table class="table">

                            <th>Nome </th>
                            <th>Horário</th>
                            <th>Sala</th>

                            <tbody>
                                
                                @foreach($disciplinas as $user)
                                <tr>
                            <td>{{ $user->nome_disciplina }}</td>
                            <td>{{ $user->horario }}</td>
                            <td>{{ $user->sala }}</td>
                            <td>
                                <p class="bt">
                                <a href="admin/disciplina/{{$user->id }}/editar"class="btn btn-outline-warning btn-sm bt"><strong>Alterar</strong></a>

                                <a href="admin/disciplina/{{$user->id }}/excluir"class="btn btn-outline-danger btn-sm bt" onclick=" return confirm('Deseja excluir?')"><strong>Excluir</strong></a>
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