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
                <h3>Deletar médico</h3>
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
        <form method="POST" action="{{ route('doctor-destroy', $doctor->id) }}">
            @csrf
            <legend>
                Dados do médico que será excluído!
            </legend>
            <br><hr>
            <div class="form-group row">
                <ul>
                    <li>{{ $doctor->name }}</li>
                    <li>{{ $doctor->specialty }}</li>
                    <li>{{ $doctor->birth }}</li>
                    <li>{{ $doctor->sexo }}</li>
                    <li>{{ $doctor->status_civil }}</li>
                    <li>{{ $doctor->document }}</li>
                    <li>{{ $doctor->email }}</li>
                    <li>{{ $doctor->phone }}</li>
                    <li>{{ $doctor->cellphone }}</li>
                    <li>{{ $doctor->street }}</li>
                    <li>{{ $doctor->cep }}</li>
                    <li>{{ $doctor->number }}</li>
                    <li>{{ $doctor->district }}</li>
                    <li>{{ $doctor->state }}</li>
                    <li>{{ $doctor->city }}</li>
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
@endsection