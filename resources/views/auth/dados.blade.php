@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dados da pesquisa</div>

                <div class="card-body" align="right">
                   <!--   <a href="{{url('/admin/nova/disciplina')}}"class="btn btn-outline-success">Nova Disciplina</a> -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    



                    <div class="panel-body">
                        <table class="table">

                            <th>Modalidade </th>
                            <th>Curso</th>
                            <th>Disciplina</th>

                            <tbody>
                                
                                @foreach($dados as $user)
                                <tr>
                            <td>{{ $user->modalidade }}</td>
                            <td>{{ $user->curso }}</td>
                            <td>{{ $user->turma }}</td>
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