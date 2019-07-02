<!doctype html>
<html>
    <head>
        <meta charset="utf-8">

        <title>eSala</title>
        <link rel="manifest" href="/manifest.json">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

      

       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

       <style>

    html, body{
                margin: 10px;
                color: black;
                font-family: 'Nunito', sans-serif;
                

            }
            .bt{
        float: right;
        margin-right: 10px;
        display: inline;
    }
    .nome{
        color: black;
        font-family: cursive;

    }

     </style>
    </head>
        <body>     
            <div class="container">
                <div class="bt">
                <a href="{{ url('/lista/download')}}" class="bt btn btn-outline-danger">PDF</a>
                <a href="{{ url('/home')}}" class="bt btn btn-secondary">Voltar</a>
                </div>
            @auth
                            
                            <div class="nome">
                            Professor(a) {{Auth::user()->nome}} 
                             </div>
                  
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
                            <td><strong>{{ $user->data }}</strong></strong></td>
                            <td><strong>{{ $user->inicio }}</strong></td>
                            <td><strong>{{ $user->termino}}</strong></td>
                            <td><strong>{{ $user->aluno}}</strong></td>
                            <td><strong>{{ $user->curso}}</strong></td>
                           
                                </tr>
                                @endforeach                                
                            </tbody>                   
                        </table>
                    </div>                  
                
            
            @endauth
            </div> 
            
    </body>
</html>