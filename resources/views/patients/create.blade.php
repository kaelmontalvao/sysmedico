@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="align-btn-home col-md-4">
                <a class="btn-home" href="{{ route('home') }}" title="Inicio">
                    <i class="bi-house" style="font-size: 2rem; color: cornflowerblue;"></i>
                </a>
            </div>
            <div class="align-menu-text col-md-4 py-2">
                <h3>Novo cadastro de pacientes</h3>
            </div>

        </div>
        <div class="float-right div-alert">
            @if (session('flash_success'))
                <div class="hide alert alert-success">
                    {{ session('flash_success') }}
                </div>
            @elseif(session('flash_error'))
                <div class="hide alert alert-danger">
                    {{ session('flash_error') }}
                </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('patient-store') }}">
            @csrf
            <div class="form-group row">
                <div class="col-md-8">
                    <label for="name">{{ __('Nome') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="sexo">{{ __('Sexo') }}</label>
                    <select name="sexo" id="sexo" class="form-control" required>
                        <option value="f">Feminino</option>
                        <option value="m">Masculino</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="birth">{{ __('Data nascimento') }}</label>
                    <input id="birth" type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth') }}" required autocomplete="birth">

                    @error('birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="status_civil">{{ __('Estado civil') }}</label>
                    <select name="status_civil" id="civil_status" class="form-control">
                        <option value="s">Solteiro</option>
                        <option value="c">Casado</option>
                        <option value="d">Divorciado</option>
                        <option value="v">Viuvo</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="document">{{ __('RG/CPF') }}</label>
                    <input id="document" type="text" class="form-control" name="document" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="phone">{{ __('Telefone') }}</label>
                    <input id="phone" type="text" class="form-control" name="phone">
                </div>
                <div class="col-md-4">
                    <label for="cellphone">{{ __('Celular') }}</label>
                    <input id="cellphone" type="text" class="form-control" name="cellphone">
                </div>
            </div>
            <hr>
            <legend>Endere??o</legend>
            <br>
            <div class="form-group row">
                <div class="col-md-8">
                    <label for="street">{{ __('Logradourro') }}</label>
                    <input id="street" type="text" class="form-control" name="street">
                </div>
                <div class="col-md-4">
                    <label for="cep">{{ __('cep') }}</label>
                    <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep">
                    @error('cep')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="number">{{ __('Numero') }}</label>
                    <input id="number" type="text" class="form-control" name="number">
                </div>
                <div class="col-md-3">
                    <label for="district">{{ __('Bairro') }}</label>
                    <input id="district" type="text" class="form-control" name="district">
                </div>
                <div class="col-md-3">
                    <label for="state">{{ __('Estado') }}</label>
                    <select class="form-control" id="state" type="text" name="state">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amap??</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Cear??</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Esp??rito Santo</option>
                        <option value="GO">Goi??s</option>
                        <option value="MA">Maranh??o</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Par??</option>
                        <option value="PB">Para??ba</option>
                        <option value="PR">Paran??</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piau??</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rond??nia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">S??o Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="city">{{ __('Cidade') }}</label>
                    <input id="city" type="text" class="form-control" name="city">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 offset-md-9">
                    <button type="submit" class="btn btn-success float-right">
                        {{ __('Salvar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
@endsection