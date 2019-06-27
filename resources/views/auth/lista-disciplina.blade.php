@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Disciplinas Cadastradas</div>

                <div class="card-body" align="right">
                     <a href="{{url('/admin/nova/disciplina')}}"class="btn btn-outline-success">Nova Disciplina</a>
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