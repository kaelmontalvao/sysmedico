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
                <h3>Deletar agendamento</h3>
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
        <form method="POST" action="{{ route('schedule-destroy', $schedule->id) }}">
            @csrf
            <legend>
                Dados do agendamento que será excluído!
            </legend>
            <br><hr>
            <div class="form-group row">
                <ul>
                    <li><strong>Nome do paciente: </strong>{{ $schedule->patient }}</li>
                    <li><strong>Médico: </strong> {{ $schedule->doctor }}</li>
                    <li><strong>Especialidade: </strong> {{ $schedule->specialty }}</li>
                    <li><strong>Data agendamento: </strong> {{ date("d/m/Y", strtotime($schedule->date)) }}</li>
                    <li><strong>Horário: </strong> {{ $schedule->hours }}</li>
                    <li><strong>Observação: </strong> {{ $schedule->observation }}</li>
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