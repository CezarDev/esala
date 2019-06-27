@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Estes professores estão logados </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    



                    <div class="panel-body">
                        <table class="table">

                            <th>Nome </th>
                            <th>Disciplina </th>
                            <th>Horário Permanência</th>
                            <th>email </th>

                            <tbody>
                                
                                @foreach($logados as $user)
                                <tr>
                            <td>{{ $user->nome }}</td>
                            <td>{{ $user->disciplina }}</td>
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
