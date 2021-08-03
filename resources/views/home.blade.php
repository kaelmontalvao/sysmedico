@extends('layouts.app')
@section('content')
<div class="text-center p-5">
@if (Auth::check())
    <strong> Escolhe um menu acima para acessar</strong>
@else
    <span>Sistema de agendamento médico Mazzatech</span>
    <br>
    <br>
    <a href="{{ route('register') }}">
        <button class="btn-lg btn-info">Registrar</button>
    </a>
    <a href="{{ route('login') }}">
        <button class="btn-lg btn-success">Logar</button>
    </a>
@endif
</div>
@endsection