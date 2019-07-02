<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="manifest" href="manifest.json">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eSala</title>
        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">



        <!-- Styles -->
        <style>
            html, body{
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0.5em;
            }

            .full-height {
                height: 50vh;
                box-shadow: 10px 2px 10px 2px green;

            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
/*
            .position-ref {
               // position: relative;
            }
*/
            .top-right {
                position: absolute;
                right: 10px;
                top: 35px;                
            }

            .logo{
             margin-left:40px;
             margin-top: 10px;
            }

            .content {
                text-align: center;
                margin-top: 0.1em;
            }

            .title {
                font-size: 110px;
                color: green;
                margin-top: 0.1em;

                
            }



            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                column-span: 20em;
                
            }.e{
                color: red;
                display: inline;

            }
            .sala{
                color:green;
                display: inline;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .color:hover
{
        background:#e6ffe6;
}
.grow:hover
{
        -webkit-transform: scale(1.3);
        -ms-transform: scale(1.3);
        transform: scale(1.3);
}
             
        </style>
    </head>
    <body>
         @if (session('mensagem'))
                        <div class="alert alert-success" role="alert">
                            {{ session('mensagem') }}
                        </div>
                    @endif     
<div class="logo">

                    <a href="http://www.ifms.edu.br/site"><img height="100px" src="imagens\ifms.png"alt="120px">
                    </a>
                
        <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    
                    
                    @auth
                        <a href="{{ url('/home') }}">Home</a>                    
                       @else (Route::has('register'))
                            
                            <a href="{{ route('login') }}"><img height="73px"src="imagens\professor.png"alt="60px"></a>
                            
                            <a href="{{ url('admin/logar') }}"><img height="65px"src="imagens\admin.png"alt="50px"></a>
                        
                    @endauth
                    @if (Route::has('professores'))
                    <a href="{{ route('logados') }}">Entre</a>
                    @endif
            @endif
             
                </div>
            

            <div class="content">
                <div class="title m-b-md">
                    <p class="e">e</p><p class="sala">SALA</p>
                </div>

                <div class="links color grow">
                    <a href="{{ url('/logados') }}">Ver Professores Logados</a>
                    
                </div>

            </div>

        </div>
        </div>

    </body>

</html>
<script>
    
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('sw.js')
    .then(reg => console.info('registered sw', reg))
    .catch(err => console.error('error registering sw', err));
}
</script>