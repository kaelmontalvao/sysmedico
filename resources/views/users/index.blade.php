@extends('layouts.app')
@section('content')
<div class="text-center p-5">
    {{-- <table class="dataTables"> --}}
    <table id="example" class="dataTables table table-striped table-bordered">
        {{-- <table id="example" class="display" style="width:100%"> --}}
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                {{-- <th>Ações</th> --}}
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($users as $user) --}}
                <tr>
                    <td>xxx</td>
                    {{-- <td>xxx</td> --}}
                    <td>
                        {{-- <a href="/usuarios/{{ $user->id }}/detalhes"> --}}
                            {{-- <span class="glyphicon glyphicon-list-alt" data-toggle="tooltip" title="Detalhes"></span> --}}
                        {{-- </a>&nbsp;&nbsp; --}}
                        {{-- <a href="/usuarios/{{ $user->id }}/editar"> --}}
                            {{-- <span class="glyphicon glyphicon glyphicon-pencil" data-toggle="tooltip" title="Editar"></span> --}}
                        {{-- </a>&nbsp;&nbsp; --}}
                        {{-- <a href="/usuarios/{{ $user->id }}/delete"> --}}
                            {{-- <span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Exluir"></span> --}}
                        {{-- </a>&nbsp;&nbsp; --}}
                    </td>
                </tr>
                <tr>
                    <td>xxx</td>
                    <td>xxx</td>
                </tr>
                <tr>
                    <td>xxx</td>
                    <td>xxx</td>
                </tr>
                <tr>
                    <td>xxx</td>
                    <td>xxx</td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
</section>
<script type="text/javascript">console.log('test')</script>
@endsection