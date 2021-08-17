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
                    <h3>Médicos</h3>
                </div>
            <div class="align-btn-new col-md-4">
                <a class="btn-plus-list" href="{{ route('doctor-create') }}" title="Novo medico">
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
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Especialidade</th>
                    <th>Email</th>
                    <th>Fone</th>
                    <th>Celular</th>
                    <th class="text-right px-4">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->sexo == 'f' ? 'Feminino': 'Masculino' }}</td>
                        <td>{{ $doctor->specialty }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->cellphone }}</td>
                        <td class="text-right">
                            <a href="{{ route('doctor-read', $doctor->id) }}" class="mr-2">
                                <i class="bi bi-card-list" data-toggle="tooltip" title="Visualizar cadastro"></i>
                            </a>
                            <a href="{{ route('doctor-edit', $doctor->id) }}" class="mr-1">
                                <i class="bi bi-pencil-square" data-toggle="tooltip" title="Editar"></i>
                            </a>
                            <a href="{{ route('doctor-delete', $doctor->id) }}" class="mr-1">
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