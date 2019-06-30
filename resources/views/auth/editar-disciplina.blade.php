@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Editar Disciplina</strong></div>

                <div class="card-body">                    
                    <form method="POST" action="{{ url('admin/alterar/disciplina',$user->id) }}">
                        <input name="id"type="hidden"value="{{$user->id}}">

                        @csrf

                        <div class="form-group row">
                            <label for="nome_disciplina" class="col-md-4 col-form-label text-md-right">{{ __('Disciplina') }}</label>

                            <div class="col-md-6">
                                <input id="nome_disciplina" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nome_disciplina" value="{{ $user->nome_disciplina }}" required autofocus>

                                @if ($errors->has('nome_disciplina'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="horario" class="col-md-4 col-form-label text-md-right">{{ __('Horario') }}</label>

                            <div class="col-md-6">
                                <input id="horario" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="horario" value="{{ $user->horario }}" required autofocus>

                                @if ($errors->has('horario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('horario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="sala" class="col-md-4 col-form-label text-md-right">{{ __('Sala') }}</label>

                            <div class="col-md-6">
                                <input id="sala" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="sala" value="{{ $user->sala }}" required>

                                @if ($errors->has('sala'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sala') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row mb-0"> -->
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"><strong>Alterar</strong></button>                                
                            </div>
                        <!-- </div> -->
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
