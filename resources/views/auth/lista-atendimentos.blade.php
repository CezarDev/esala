@extends('layouts.app')
              <div class="card-header"><strong>Seus Atendimentos Registrados</strong> </div>

                <div class="card-body" align="right">
                    <a href="{{ url('/lista/download')}}" class="btn btn-outline-danger">PDF</a>

                    <div class="panel-body">
                        <table class="table">
                            <tr>
                            <th>Data</th>
                            <th>Início</th>
                            <th>Término</th>
                            <th>Aluno</th>
                            <th>Curso</th>
                            </tr>
                            <tbody>                                
                                @foreach($atendimentos as $user)
                                <tr>
                            <td>{{ $user->data }}</td>
                            <td>{{ $user->inicio }}</td>
                            <td>{{ $user->termino}}</td>
                            <td>{{ $user->aluno}}</td>
                            <td>{{ $user->curso}}</td>
                            
                                </tr>
                                @endforeach                                
                            </tbody>                   
                        </table>
                    </div>                  
                </div>
            </div>

         
