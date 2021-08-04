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
                <h3>Deletar paciente</h3>
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
        <form method="POST" action="{{ route('patient-destroy', $patient->id) }}">
            @csrf
            <legend>
                Dados do paciente que será excluído!
            </legend>
            <br><hr>
            <div class="form-group row">
                <ul>
                    <li>{{ $patient->name }}</li>
                    <li>{{ $patient->birth }}</li>
                    <li>{{ $patient->sexo }}</li>
                    <li>{{ $patient->status_civil }}</li>
                    <li>{{ $patient->document }}</li>
                    <li>{{ $patient->email }}</li>
                    <li>{{ $patient->phone }}</li>
                    <li>{{ $patient->cellphone }}</li>
                    <li>{{ $patient->street }}</li>
                    <li>{{ $patient->cep }}</li>
                    <li>{{ $patient->number }}</li>
                    <li>{{ $patient->district }}</li>
                    <li>{{ $patient->state }}</li>
                    <li>{{ $patient->city }}</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-3 offset-md-9">
                    <button type="submit" class="btn btn-danger float-right">
                        {{ __('Confirmar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
<script type="text/javascript">console.log('test')</script>
@endsection