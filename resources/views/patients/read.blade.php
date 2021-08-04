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
                <h3>Visualizar cadastro de paciente</h3>
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
        <div class="form-group row">
            <div class="col-md-8">
                <label for="name">{{ __('Nome') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $patient->name) }}" required autocomplete="name" readonly>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="sexo">{{ __('Sexo') }}</label>
                <select name="sexo" id="sexo" class="form-control" required readonly>
                    <option value="f" {{ $patient->sexo == "f" ? 'selected' : ""}}>Feminino</option>
                    <option value="m" {{ $patient->sexo == "m" ? 'selected' : "" }}>Masculino</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="birth">{{ __('Data nascimento') }}</label>
                <input id="birth" type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth', $patient->birth) }}" required autocomplete="birth" readonly>
                @error('birth')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="status_civil">{{ __('Estado civil') }}</label>
                <select name="status_civil" id="status_civil" class="form-control" readonly>
                    <option value="s" {{ $patient->status_civil == "s" ? 'selected' : ""}}>Solteiro</option>
                    <option value="c" {{ $patient->status_civil == "c" ? 'selected' : ""}}>Casado</option>
                    <option value="d" {{ $patient->status_civil == "d" ? 'selected' : ""}}>Divorciado</option>
                    <option value="v" {{ $patient->status_civil == "v" ? 'selected' : ""}}>Viuvo</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="document">{{ __('RG/CPF') }}</label>
                <input id="document" type="text" class="form-control" name="document" required value="{{ old('document', $patient->document) }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email', $patient->email) }}" readonly>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="phone">{{ __('Telefone') }}</label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone', $patient->phone) }}" readonly>
            </div>
            <div class="col-md-4">
                <label for="cellphone">{{ __('Celular') }}</label>
                <input id="cellphone" type="text" class="form-control" name="cellphone" value="{{ old('cellphone', $patient->cellphone) }}" readonly>
            </div>
        </div>
        <hr>
        <legend>Endereço</legend>
        <br>
        <div class="form-group row">
            <div class="col-md-8">
                <label for="street">{{ __('Logradourro') }}</label>
                <input id="street" type="text" class="form-control" name="street" value="{{ old('street', $patient->street) }}" readonly>
            </div>
            <div class="col-md-4">
                <label for="cep">{{ __('cep') }}</label>
                <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep', $patient->cep) }}" readonly>
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
                <input id="number" type="text" class="form-control" name="number" value="{{ old('number', $patient->number) }}" readonly>
            </div>
            <div class="col-md-3">
                <label for="district">{{ __('Bairro') }}</label>
                <input id="district" type="text" class="form-control" name="district" value="{{ old('district', $patient->district) }}" readonly>
            </div>
            <div class="col-md-3">
                <label for="state">{{ __('Estado') }}</label>
                <select class="form-control" id="state" type="text" name="state" readonly>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="city">{{ __('Cidade') }}</label>
                <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $patient->city) }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
</section>
@endsection