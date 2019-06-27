@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Cadastrar Disciplina</strong></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/disciplina/salvar') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Id Professor') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ old('user_id') }}" required autofocus>

                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nome_disciplina" class="col-md-4 col-form-label text-md-right">{{ __('Disciplina') }}</label>

                            <div class="col-md-6">
                                <input id="nome_disciplina" type="text" class="form-control{{ $errors->has('nome_disciplina') ? ' is-invalid' : '' }}" name="nome_disciplina" value="{{ old('nome_disciplina') }}" required autofocus>

                                @if ($errors->has('nome_disciplina'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome_disciplina') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="horario" class="col-md-4 col-form-label text-md-right">{{ __('Horario') }}</label>

                            <div class="col-md-6">
                                <input id="horario" type="text" class="form-control{{ $errors->has('horario') ? ' is-invalid' : '' }}" name="horario" value="{{ old('horario') }}" required autofocus>

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
                                <input id="sala" type="text" class="form-control{{ $errors->has('sala') ? ' is-invalid' : '' }}" name="sala" value="{{ old('sala') }}" required>

                                @if ($errors->has('sala'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sala') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Cadastrar') }}
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
