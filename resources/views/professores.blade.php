@extends('layouts.app')
              <div class="card-header"><strong>Todos professores cadastrados</strong> </div>

                <div class="card-body" align="right">
                    <a href="{{ url('download')}}" class="btn btn-outline-danger">PDF</a>

                    <div class="panel-body">
                        <table class="table">
                            <tr>
                            <th>Professor </th>
                            <th>Disciplina </th>
                            <th>Horário </th>
                            <th>Sala</th>
                            <th>Permanências</th>
                            <th>email </th>
                            </tr>
                            <tbody>                                
                                @foreach($professores as $user)
                                <tr>
                            <td>{{ $user->nome }}</td>
                            <td>{{ $user->nome_disciplina }}</td>
                            <td>{{ $user->horario}}</td>
                            <td>{{ $user->sala}}</td>
                            <td>{{ $user->horario_permanencia}}</td>
                            <td>{{ $user->email }}</td>
                                </tr>
                                @endforeach                                
                            </tbody>                   
                        </table>
                    </div>                  
                </div>
            </div>

         
