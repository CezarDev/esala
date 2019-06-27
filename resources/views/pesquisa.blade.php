<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eSala</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js></script>

       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <style type="text/css">
            .box{
            width: 600px;
            margin:0 auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            line-height: 24px;
            box-shadow: 5px 3px 2px;
            margin-top: 100px;
            background-color: #ccffcc;
            text-shadow:1px;

    }
    .estilos{
        
            font-family: cursive;
    }
    .btn-outline-success{
       margin-left: 250px;
       margin-bottom: 10px;

    }
    body{
        background-color:#e6ffe6;
    }
    .roda{
        background-color: lightgreen;
        width:100%;
        margin-top: 50px;
        padding: 14px;
        font: sans-serif;
        font-size: 1em;
        text-align: center;
        grid-row: 5;          
    }
    a:hover{
        opacity: 50px;
        background-color: lightgrey;
    }
    .opt a:hover{
        background-color: green;
    }            
        </style>            
    </head>
    <body>
        <br />
        <form method="POST" action="{{ url('/pesquisa/salvar') }}">
        <div class="estilos">
            <div class="container box">
            <h3 align="center">Modalidade</h3> <br />
            <div class="form-group">
            <select name="modalidade" id="modalidade"class="form-control input-lg dynamic"data-dependent="curso" required autofocus>
            <option value="">Modalidade</option>
            @foreach($lista as $modalidade)
            <option value="{{$modalidade->modalidade}}">
                {{$modalidade->modalidade}}
            </option>
            @endforeach    
            </select>
        </div>
            <br />     
        <div class="form-group">
            <h3 align="center">Curso</h3><br />
            <select name="curso" id="curso"class="form-control input-lg dynamic" data-dependent="turma" required autofocus>
            <option value="">Curso</option>
            @foreach($lista as $curso)
             <option value="{{$curso->curso}}">
                {{$curso->curso}}
            </option>
            @endforeach
            </select>
        </div>    
            <br />
        <div class="form-group">
            <h3 align="center">Turma</h3><br />
            <select name="turma" id="turma"class="form-control input-lg" required autofocus>
             <option value="">Turma</option>
            @foreach($lista as $turma)
            <option value="{{$turma->turma}}">
                {{$turma->turma}}
            </option>
            @endforeach
            </select>
        </div> 
            <div align="center" class="form-group">                            
                    <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Enviar') }}
                    </button>                            
            </div>  
<!--             <a href="" class="btn btn-outline-success">Enviar</a>
 -->            {{ csrf_field() }}
    </div>
    </div> 
</form>
        <br />   
    <!-- <footer>
        <div class="roda">
            <a href=""></a>
        </div>
    </footer>     -->
    </body>
</html>
<script>
      $(document).ready(function(){
        $('.dynamic').change(function(){
                if ($(this).val() !=''){
                    var select = $(this).attr('id');
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();                    
                    $.ajax({
                           url:"{{route('pesquisa.fetch')}}",
                           method:"POST",
                           data:{select:select, value:value, _token:_token, dependent:dependent},
                           success:function(result){
                            $('#'+dependent).html(result);
                           } 
                    })
                }
        });

        $('#modalidade').change(function(){
        $('#curso').val('');
        $('#turma').val('');
        });
        
        $('#curso').change(function(){
        $('#turma').val('');
        });

      });
  </script>
