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
                <h3>Alterar cadastro de paciente</h3>
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
        <form method="POST" action="{{ route('patient-update', $patient->id) }}">
            @csrf
            <div class="form-group row">
                <div class="col-md-8">
                    <label for="name">{{ __('Nome') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $patient->name) }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="sexo">{{ __('Sexo') }}</label>
                    <select name="sexo" id="sexo" class="form-control" required>
                        <option value="f" {{ $patient->sexo == "f" ? 'selected' : ""}}>Feminino</option>
                        <option value="m" {{ $patient->sexo == "m" ? 'selected' : "" }}>Masculino</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="birth">{{ __('Data nascimento') }}</label>
                    <input id="birth" type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth', $patient->birth) }}" required autocomplete="birth">
                    @error('birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="status_civil">{{ __('Estado civil') }}</label>
                    <select name="status_civil" id="status_civil" class="form-control">
                        <option value="s" {{ $patient->status_civil == "s" ? 'selected' : ""}}>Solteiro</option>
                        <option value="c" {{ $patient->status_civil == "c" ? 'selected' : ""}}>Casado</option>
                        <option value="d" {{ $patient->status_civil == "d" ? 'selected' : ""}}>Divorciado</option>
                        <option value="v" {{ $patient->status_civil == "v" ? 'selected' : ""}}>Viuvo</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="document">{{ __('RG/CPF') }}</label>
                    <input id="document" type="text" class="form-control" name="document" required value="{{ old('document', $patient->document) }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email', $patient->email) }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="phone">{{ __('Telefone') }}</label>
                    <input id="phone" type="text" class="form-control" name="phone" attrname="telephone1" value="{{ old('phone', $patient->phone) }}">
                </div>
                <div class="col-md-4">
                    <label for="cellphone">{{ __('Celular') }}</label>
                    <input id="cellphone" type="text" class="form-control" name="cellphone" attrname="telephone2" value="{{ old('cellphone', $patient->cellphone) }}">
                </div>
            </div>
            <hr>
            <legend>Endere??o</legend>
            <br>
            <div class="form-group row">
                <div class="col-md-8">
                    <label for="street">{{ __('Logradourro') }}</label>
                    <input id="street" type="text" class="form-control" name="street" value="{{ old('street', $patient->street) }}">
                </div>
                <div class="col-md-4">
                    <label for="cep">{{ __('cep') }}</label>
                    <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep', $patient->cep) }}">
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
                    <input id="number" type="text" class="form-control" name="number" value="{{ old('number', $patient->number) }}">
                </div>
                <div class="col-md-3">
                    <label for="district">{{ __('Bairro') }}</label>
                    <input id="district" type="text" class="form-control" name="district" value="{{ old('district', $patient->district) }}">
                </div>
                <div class="col-md-3">
                    <label for="state">{{ __('Estado') }}</label>
                    <select class="form-control" id="state" type="text" name="state">
                        <option value="AC" {{ $patient->state == 'AC' ? 'selected' : '' }}>Acre</option>
                        <option value="AL" {{ $patient->state == 'AL' ? 'selected' : '' }}>Alagoas</option>
                        <option value="AP" {{ $patient->state == 'AP' ? 'selected' : '' }}>Amap??</option>
                        <option value="AM" {{ $patient->state == 'AM' ? 'selected' : '' }}>Amazonas</option>
                        <option value="BA" {{ $patient->state == 'BA' ? 'selected' : '' }}>Bahia</option>
                        <option value="CE" {{ $patient->state == 'CE' ? 'selected' : '' }}>Cear??</option>
                        <option value="DF" {{ $patient->state == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                        <option value="ES" {{ $patient->state == 'ES' ? 'selected' : '' }}>Esp??rito Santo</option>
                        <option value="GO" {{ $patient->state == 'GO' ? 'selected' : '' }}>Goi??s</option>
                        <option value="MA" {{ $patient->state == 'MA' ? 'selected' : '' }}>Maranh??o</option>
                        <option value="MT" {{ $patient->state == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                        <option value="MS" {{ $patient->state == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                        <option value="MG" {{ $patient->state == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                        <option value="PA" {{ $patient->state == 'PA' ? 'selected' : '' }}>Par??</option>
                        <option value="PB" {{ $patient->state == 'PB' ? 'selected' : '' }}>Para??ba</option>
                        <option value="PR" {{ $patient->state == 'PR' ? 'selected' : '' }}>Paran??</option>
                        <option value="PE" {{ $patient->state == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                        <option value="PI" {{ $patient->state == 'PI' ? 'selected' : '' }}>Piau??</option>
                        <option value="RJ" {{ $patient->state == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                        <option value="RN" {{ $patient->state == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                        <option value="RS" {{ $patient->state == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                        <option value="RO" {{ $patient->state == 'RO' ? 'selected' : '' }}>Rond??nia</option>
                        <option value="RR" {{ $patient->state == 'RR' ? 'selected' : '' }}>Roraima</option>
                        <option value="SC" {{ $patient->state == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                        <option value="SP" {{ $patient->state == 'SP' ? 'selected' : '' }}>S??o Paulo</option>
                        <option value="SE" {{ $patient->state == 'SE' ? 'selected' : '' }}>Sergipe</option>
                        <option value="TO" {{ $patient->state == 'TO' ? 'selected' : '' }}>Tocantins</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="city">{{ __('Cidade') }}</label>
                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $patient->city) }}">
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
@push('scripts-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
<script type="text/javascript">

    function inputHandler(masks, max, event) {
      var c = event.target;
      var v = c.value.replace(/\D/g, '');
      var m = c.value.length > max ? 1 : 0;
      VMasker(c).unMask();
      VMasker(c).maskPattern(masks[m]);
      c.value = VMasker.toPattern(v, masks[m]);
    }

    var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
    var tel = document.querySelector('input[attrname=telephone1]');
    VMasker(tel).maskPattern(telMask[0]);
    tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

    var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
    var tel2 = document.querySelector('input[attrname=telephone2]');
    VMasker(tel2).maskPattern(telMask[0]);
    tel2.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

    $( "#document").keyup(function() {
        if ($("#document").val().length < 11 || $("#document").val().length == 13) {
            VMasker(document.querySelector("#document")).unMask();
        }else{
            VMasker(document.querySelector("#document")).maskPattern("999.999.999-99");
        }
    });
</script>
@endpush
@endsection