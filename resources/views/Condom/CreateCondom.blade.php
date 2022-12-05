@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" >

@section('content')
<div class="d-flex justify-content-center" style='min-height: calc(100vh - 355px)'>
    <div class="col-md-8 mb-5" style='max-width: 800px'>
            <div class="card">
                @if($permission)
                <div class="card-header">
                    @if(Request::is('*/edit/*'))Editar Camisinha @else Criar Camisinha @endif</div>

                <div class="card-body">
                    @if(Request::is('*/edit/*'))
                    <form action="{{ url('condom/update') }}/{{ $condom->id }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="name" value='{{$condom->name}}' class="form-control" id="nome" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="preço" class="form-label">Preço</label>
                            <input type="text" name="flavor" value='{{$condom->price}}' class="form-control" id="preço" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <input type="number" name="quantity" value='{{$condom->quantity}}' class="form-control" id="quantidade" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" name="description" value='{{$condom->description}}' class="form-control" id="descricao" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Imagem</label>
                            <input type="file" name="file" class="form-control" id="img" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <select id="marca" name="brand_id" value="{{$condom->brand_id}}" class="form-control">
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a type="submit" class="btn btn-dark" href="condons">Voltar</a>
                            <button type="submit" class="btn btn-dark">Salvar</button>
                        </div>
                    </form>
                    @else
                    <form action="{{ url('condom/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="nome" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="preço" class="form-label">Preço</label>
                            <input type="number" name="price" class="form-control" id="preço" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <input type="number" name="quantity" class="form-control" id="quantidade" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" name="description" class="form-control" id="descricao" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Imagem</label>
                            <input type="file" name="file" class="form-control" id="img" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <select id="marca" name="brand_id" class="form-control">
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                            <a href="brand">Não possui marca? cadastre uma agora</a>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a type="submit" class="btn btn-dark" href="brands">Voltar</a>
                            <button type="submit" class="btn btn-dark">Salvar</button>
                        </div>
                    </form>
                    @endif
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
