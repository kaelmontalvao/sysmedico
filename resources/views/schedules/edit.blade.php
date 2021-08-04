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
                <h3>Alteração agendamento</h3>
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
        <form method="POST" action="{{ route('schedule-update', $schedule->id) }}">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="patient_id">Paciente</label>
                    <select id="patient_id" name="patient_id" class="form-control placeholder" disabled>
                        <option value="">Selecione o paciente</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $schedule->patient_id == $patient->id ? 'selected' : ""}}>{{ $patient->id }} - {{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="doctor_id">Médico</label>
                    <select id="doctor_id" name="doctor_id" class="form-control placeholder" required>
                        <option value="">Selecione o médico</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $schedule->doctor_id == $doctor->id ? 'selected' : ""}}>{{ $doctor->name }} - {{ $doctor->specialty }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="date">{{ __('Data') }}</label>
                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', $schedule->date) }}" required autocomplete="date">
                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="hours">{{ __('Horário') }}</label>
                    <input id="hours" type="time" class="form-control @error('hours') is-invalid @enderror" name="hours" value="{{ old('hours', $schedule->hours) }}" required autocomplete="hours">

                    @error('hours')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="mb-12 p-xl-3">
                    <label for="observation">Observação</label>
                    <textarea class="form-control" id="observation" name="observation" cols="150px" value="{{ old('observation', $schedule->observation) }}">{{ $schedule->observation }}</textarea>
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