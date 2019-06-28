
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

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
    /*.ter , .ini{
        width:90px;

    }*/
    #id{
        float: right;
    }
     
    a:hover{
        opacity: 50px;
        background-color: lightgrey;
    }
    .opt a:hover{
        background-color: green;
    }  

    .titulo{
        font-family: cursive;
        text-shadow: 2px;
    }          
        </style>            
    </head>
    <body><br><p class="titulo">
        <h2 align="center">Registre seu atendimento na permanência</h2>
    </p>
        <form method="POST" action="{{ url('/atendimento/salvar') }}">
        <div class="estilos">
            <div class="container box">
            <h3 align="center">Professor</h3> <br />
            <div class="form-group">
            <select name="nome" id="nome"class="form-control input-lg dynamic"data-dependent="id" required autofocus>
            <option value="">Nome</option>
            @foreach($lista as $nome)
            <option value="{{$nome->nome}}">

                {{$nome->nome}} 


            </option>
           <!--  <input type="hidden" name="id" id="id" value="{{$nome->id}}"> -->
            @endforeach 
            </select>            
        </div>
                
       
            <div class="form-group">
            <select name="user_id" id="id"class="col-sm-2 form-control dynamic" required autofocus>
            <option value="">id</option>
            @foreach($lista as $id)
             <option value="{{$id->id}}">
                {{$id->id}}
            </option>
            @endforeach
            </select>
         </div>
            <br>
        <div class="form-group">
            <h3 align="center">Data</h3><br>
            <input  name="data" type="date" placeholder="Selecione o dia do atendimento"  id="data" class="form-control" required autofocus>
        </div> 

        <div class="form-group">
            <h3 align="center">Início</h3><br>
            <input name="inicio" type="time" id="inicio" class="form-control" required autofocus>
        </div>

        <div class="form-group">
            <h3 align="center">Término</h3><br/>
            <input name="termino"type="time" id="termino" class="form-control" required autofocus>
        </div>

        <div class="form-group">
            <h3 align="center">Aluno</h3><br/>
            <input name="aluno" type="text" id="aluno" placeholder="Seu nome"class="form-control"required autofocus>

        <h3 align="center">Curso</h3> <br />
            <div class="form-group">
            <select name="curso" id="curso"class="form-control input-lg dynamic"data-dependent="horario_permanencia" required autofocus>
            <option value="">Curso</option>
            @foreach($cursos as $curso)
            <option value="{{$curso->curso}}">
                {{$curso->curso}}
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
                           url:"{{route('atendimento.fetch')}}",
                           method:"POST",
                           data:{select:select, value:value, _token:_token, dependent:dependent},
                           success:function(result){
                            $('#'+dependent).html(result);
                           } 
                    })
                }
        });

        $('#nome').change(function(){
        $('#id').val('');
        });
        
        $('#nome').change(function(){
        $('#id').val('');
        });

      });
 
//  $(function(){
//  $.datepicker.regional['pt-BR'] = {
//   closeText: 'Fechar',
//   prevText: '&#x3c;Anterior',
//   nextText: 'Pr&oacute;ximo&#x3e;',
//   currentText: 'Hoje',
//   monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
//   'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
//   monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
//   'Jul','Ago','Set','Out','Nov','Dez'],
//   dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
//   dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
//   dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
//   weekHeader: 'Sm',
//   dateFormat: 'dd/mm/yy',
//   firstDay: 0,
//   isRTL: false,
//   showMonthAfterYear: false,
//   yearSuffix: ''};
//  $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
// });

//     $(function() {        
//         //$.datepicker.regional[ "pt-BR" ] );
//         //$( "#datepicker" ).datepicker( $.datepicker.regional[ "pt-BR" ]);


//         $("#data").datepicker({dateFormat:'dd-mm-yy'});

//     });
  </script> 
