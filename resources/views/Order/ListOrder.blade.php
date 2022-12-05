@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" >

@section('content')
    <div class="d-flex justify-content-center" style='height: calc(100vh - 355px)'>
        <div class="col-md-8" style='max-width: 800px'>
            <div class="card">
                <div class="card-header">Lista de Pedidos</div>

                <div class="card-body">
                    <table class="table table-hover table-stripped text-center">
                        <thead>
                            <tr>
                                <td>Usuário</td>
                                <td>Produto</td>
                                <td>Data de Compra</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->user->name}}</td>
                                <td>Camisinha {{$order->condom->name}}</td>
                                <td>{{$order->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex">
                        <a class='btn btn-dark' href="/">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.footer')
