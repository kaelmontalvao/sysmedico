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
                    <h3>Agendamento</h3>
                </div>
            <div class="align-btn-new col-md-4">
                <a class="btn-plus-list" href="{{ route('schedule-create') }}" title="Novo Agendamento">
                    <i class="bi bi-plus-circle" style="font-size: 2rem; color: cornflowerblue;"></i>
                </a>
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
        <table id="datatable" class="table-responsive-md table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Especialidade</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th class="text-right px-4">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->patient }}</td>
                        <td>{{ $schedule->doctor }}</td>
                        <td>{{ $schedule->specialty }}</td>
                        <td>{{ date("d/m/Y", strtotime($schedule->date)) }}</td>
                        <td>{{ $schedule->hours }}</td>
                        {{-- <td>{{ $schedule->cellphone }}</td> --}}
                        <td class="text-right">
                            <a href="{{ route('schedule-read', $schedule->id) }}" class="mr-2">
                                <i class="bi bi-card-list" data-toggle="tooltip" title="Visualizar cadastro"></i>
                            </a>
                            <a href="{{ route('schedule-edit', $schedule->id) }}" class="mr-1">
                                <i class="bi bi-pencil-square" data-toggle="tooltip" title="Editar"></i>
                            </a>
                            <a href="{{ route('schedule-delete', $schedule->id) }}" class="mr-1">
                                <i class="bi bi-trash" data-toggle="tooltip" title="Excluir"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection