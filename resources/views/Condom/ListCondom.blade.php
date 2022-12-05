@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" >

@section('content')
    <div class="d-flex justify-content-center" style='height: calc(100vh - 355px)'>
        <div class="col-md-8" style='max-width: 800px'>
            <div class="card">
                @if($permission)
                <div class="card-header">Lista de Camisinhas</div>
                <div class="card-body">
                    <table class="table table-hover table-stripped text-center">
                        <thead>
                            <tr>
                                <td>Imagem</td>
                                <td>Nome</td>
                                <td>Preço</td>
                                <td>Quantidade</td>
                                <td>Marca</td>
                                <td>Editar</td>
                                <td>Deletar</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($condons as $condom)
                            <tr>
                                <td class="img-list"><img src="{{asset('storage/'.$condom->file.'')}}"/></td>
                                <td>{{$condom->name}}</td>
                                <td>{{$condom->price}}</td>
                                <td>{{$condom->quantity}}</td>
                                <td>{{$condom->brand->name}}</td>
                                <td><a class="btn btn-warning" href='/condom/edit/{{$condom->id}}'>Editar</a></td>
                                <td>
                                    <form action="/condom/delete/{{$condom->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex">
                        <a class='btn btn-dark' href="/">Voltar</a>
                        <a class='btn btn-dark ms-auto' href="/condom">Cadastrar</a>
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
