@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Editar Professor</strong></div>

                <div class="card-body">                    
                    <form method="POST" action="{{ url('admin/alterar',$user->id) }}">
                        <input name="id"type="hidden"value="{{$user->id}}">

                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nome" value="{{ $user->nome }}" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="local_permanencia" class="col-md-4 col-form-label text-md-right">{{ __('Local de Permanência') }}</label>

                            <div class="col-md-6">
                                <input id="local_permanencia" type="text" class="form-control{{ $errors->has('local_permanencia') ? ' is-invalid' : '' }}" name="local_permanencia" value="{{ $user->local_permanencia }}" required autofocus>

                                @if ($errors->has('horario_permanencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('local_permanencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Horario de Permanência') }}</label>

                            <div class="col-md-6">
                                <input id="horario_permanencia" type="text" class="form-control{{ $errors->has('horario_permanencia') ? ' is-invalid' : '' }}" name="horario_permanencia" value="{{ $user->horario_permanencia }}" required autofocus>

                                @if ($errors->has('horario_permanencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('horario_permanencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme a senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"><strong>Alterar</strong></a>
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
