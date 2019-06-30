@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header"><strong>Todos professores cadastrados</strong></div>

                <div class="card-body" align="right">
                    <a href="{{url('/admin/novo/professor')}}" class="btn btn-outline-success">Novo Professor</a>
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
                            <th>Horário Permanência</th>
                            <th>Email</th>
                            <tbody>                                
                                @foreach($professores as $user)
                                <tr>
                            <td><strong>{{ $user->nome }}</strong></td>
                            <td>{{ $user->horario_permanencia }}</td>
                            <td>{{ $user->email }}</td>
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
   
    }
</style>