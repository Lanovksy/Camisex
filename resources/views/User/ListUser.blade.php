@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" >

@section('content')
<div class="d-flex justify-content-center" style='height: calc(100vh - 355px)'>
    <div class="col-md-8" style='max-width: 800px'>
            <div class="card">
                @if($permission)
                <div class="card-header">Lista de Usuários</div>
                <div class="card-body">
                    <table class="table table-hover table-stripped text-center">
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Email</td>
                                <td>Total de Pedidos</td>
                                <td>Conta Criada</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{count($user->orders)}}</td>
                                <td>{{$user->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex">
                        <a class='btn btn-dark' href="/">Voltar</a>
                    </div>
                </div>
                @else
                <div class="p-5 text-center">
                    <p class='display-6'>Sem Permissão</p>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@extends('layouts.footer')
