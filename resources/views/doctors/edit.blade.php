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
                <h3>Alterar cadastro de médico</h3>
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
        <form method="POST" action="{{ route('doctor-update', $doctor->id) }}">
            @csrf
            <div class="form-group row">
                <div class="col-md-8">
                    <label for="name">{{ __('Nome') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $doctor->name) }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="sexo">{{ __('Sexo') }}</label>
                    <select name="sexo" id="sexo" class="form-control" required>
                        <option value="f" {{ $doctor->sexo == "f" ? 'selected' : ""}}>Feminino</option>
                        <option value="m" {{ $doctor->sexo == "m" ? 'selected' : "" }}>Masculino</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="birth">{{ __('Data nascimento') }}</label>
                    <input id="birth" type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth', $doctor->birth) }}" required autocomplete="birth">
                    @error('birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="status_civil">{{ __('Estado civil') }}</label>
                    <select name="status_civil" id="status_civil" class="form-control">
                        <option value="s" {{ $doctor->status_civil == "s" ? 'selected' : ""}}>Solteiro</option>
                        <option value="c" {{ $doctor->status_civil == "c" ? 'selected' : ""}}>Casado</option>
                        <option value="d" {{ $doctor->status_civil == "d" ? 'selected' : ""}}>Divorciado</option>
                        <option value="v" {{ $doctor->status_civil == "v" ? 'selected' : ""}}>Viuvo</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="document">{{ __('RG/CPF') }}</label>
                    <input id="document" type="text" class="form-control" name="document" required value="{{ old('document', $doctor->document) }}">
                </div>
                <div class="col-md-3">
                    <label for="crm">{{ __('CRM') }}</label>
                    <input id="crm" type="text" class="form-control" name="crm" required value="{{ old('crm', $doctor->crm) }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email', $doctor->email) }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="phone">{{ __('Telefone') }}</label>
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone', $doctor->phone) }}">
                </div>
                <div class="col-md-3">
                    <label for="cellphone">{{ __('Celular') }}</label>
                    <input id="cellphone" type="text" class="form-control" name="cellphone" value="{{ old('cellphone', $doctor->cellphone) }}">
                </div>
                <div class="col-md-3">
                    <label for="specialty">{{ __('Especialidade') }}</label>
                    <input id="specialty" type="text" class="form-control" name="specialty" value="{{ old('specialty', $doctor->specialty) }}">
                </div>
            </div>
            <hr>
            <legend>Endereço</legend>
            <br>
            <div class="form-group row">
                <div class="col-md-8">
                    <label for="street">{{ __('Logradourro') }}</label>
                    <input id="street" type="text" class="form-control" name="street" value="{{ old('street', $doctor->street) }}">
                </div>
                <div class="col-md-4">
                    <label for="cep">{{ __('cep') }}</label>
                    <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep', $doctor->cep) }}">
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
                    <input id="number" type="text" class="form-control" name="number" value="{{ old('number', $doctor->number) }}">
                </div>
                <div class="col-md-3">
                    <label for="district">{{ __('Bairro') }}</label>
                    <input id="district" type="text" class="form-control" name="district" value="{{ old('district', $doctor->district) }}">
                </div>
                <div class="col-md-3">
                    <label for="state">{{ __('Estado') }}</label>
                    <select class="form-control" id="state" type="text" name="state">
                        <option value="AC" {{ $doctor->state == 'AC' ? 'selected' : '' }}>Acre</option>
                        <option value="AL" {{ $doctor->state == 'AL' ? 'selected' : '' }}>Alagoas</option>
                        <option value="AP" {{ $doctor->state == 'AP' ? 'selected' : '' }}>Amapá</option>
                        <option value="AM" {{ $doctor->state == 'AM' ? 'selected' : '' }}>Amazonas</option>
                        <option value="BA" {{ $doctor->state == 'BA' ? 'selected' : '' }}>Bahia</option>
                        <option value="CE" {{ $doctor->state == 'CE' ? 'selected' : '' }}>Ceará</option>
                        <option value="DF" {{ $doctor->state == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                        <option value="ES" {{ $doctor->state == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                        <option value="GO" {{ $doctor->state == 'GO' ? 'selected' : '' }}>Goiás</option>
                        <option value="MA" {{ $doctor->state == 'MA' ? 'selected' : '' }}>Maranhão</option>
                        <option value="MT" {{ $doctor->state == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                        <option value="MS" {{ $doctor->state == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                        <option value="MG" {{ $doctor->state == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                        <option value="PA" {{ $doctor->state == 'PA' ? 'selected' : '' }}>Pará</option>
                        <option value="PB" {{ $doctor->state == 'PB' ? 'selected' : '' }}>Paraíba</option>
                        <option value="PR" {{ $doctor->state == 'PR' ? 'selected' : '' }}>Paraná</option>
                        <option value="PE" {{ $doctor->state == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                        <option value="PI" {{ $doctor->state == 'PI' ? 'selected' : '' }}>Piauí</option>
                        <option value="RJ" {{ $doctor->state == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                        <option value="RN" {{ $doctor->state == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                        <option value="RS" {{ $doctor->state == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                        <option value="RO" {{ $doctor->state == 'RO' ? 'selected' : '' }}>Rondônia</option>
                        <option value="RR" {{ $doctor->state == 'RR' ? 'selected' : '' }}>Roraima</option>
                        <option value="SC" {{ $doctor->state == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                        <option value="SP" {{ $doctor->state == 'SP' ? 'selected' : '' }}>São Paulo</option>
                        <option value="SE" {{ $doctor->state == 'SE' ? 'selected' : '' }}>Sergipe</option>
                        <option value="TO" {{ $doctor->state == 'TO' ? 'selected' : '' }}>Tocantins</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="city">{{ __('Cidade') }}</label>
                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $doctor->city) }}">
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