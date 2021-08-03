@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="align-btn-home col-md-4">
                <a class="btn-home" href="{{ route('home') }}" title="Inicio">
                    {{-- <i class="bi bi-house p-5"></i> --}}
                    <i class="bi-house" style="font-size: 2rem; color: cornflowerblue;"></i>
                </a>
            </div>
                <div class="align-menu-text col-md-4 py-2">
                    <h3>Usuários</h3>
                </div>
            <div class="align-btn-new col-md-4">
                <a class="btn-plus-list" href="{{ route('user-create') }}" title="Criar novo usuário">
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
    {{-- <table class="dataTables"> --}}
        <table id="datatable" class="table-responsive-md table table-striped table-bordered">
        {{-- <table id="example" class="dataTables table table-striped table-bordered" style="width:100%"> --}}
            {{-- <table id="example" class="display" style="width:100%"> --}}
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th class="text-right">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-right">
                            <a href="{{ route('user-edit', $user->id) }}" class="px-2">
                                <i class="bi bi-pencil-square" data-toggle="tooltip" title="Editar"></i>
                            </a>
                            <a href="#" data-id="{{ $user->id }}" onclick="openModal($(this))">
                                <i class="bi bi-trash" data-toggle="tooltip" title="Excluir"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Excluir usuário</h4>
            </div>
            <div class="modal-body">
                <p>Confirma essa ação ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-save" onclick="save()">Salvar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
</section>
<script type="text/javascript">
    var userId = "";
    function openModal(element){
        userId = element.attr('data-id');
        console.log(userId);
        $('#modal-delete').modal();
    }

    function save() {
        let modal = $('#modal-delete');
        modal.modal('hide');
        $.when(storeModal(userId)).done(function() {
            window.location.reload();
        })
    }

    /* Salva via ajax */
    function storeModal(userId) {
        return $.ajax({
            type: "POST",
            url: "{{route('user-destroy')}}",
            data:  {
                _token: '{!! csrf_token() !!}',
                userId: userId
            },
            dataType: "json",
            // success: function (response) {
            //     // console.log(response);
            //     alert(response['message']);
            // },
            // error: function (response) {
            //     // alertErrorAjax(response.status);
            // }
        });
    }
</script>
@endsection