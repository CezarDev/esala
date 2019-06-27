@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header"><strong>Você entrou na eSALA</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
                    <div align="center">
                    <a href="{{ url('/lista/atendimento') }}"><img height="250px"src="imagens\atendimento.png"alt="150px" ></a>
                    </div>
                    
                    
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
