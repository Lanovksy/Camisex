@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" >

{{-- Section para renderizar dentro da página principal da navbar --}}
@section('content')
<div class="d-flex justify-content-center" style='height: calc(100vh - 355px)'>
    <div class="col-md-8" style='max-width: 800px'>
            <div class="card">

                {{-- Se for admin, aparece tudo isso, se não aparece sem permissão --}}
                @if($permission)
                <div class="card-header">Lista de Marcas</div>

                <div class="card-body">
                    <table class="table table-hover table-stripped text-center">
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Qualidade</td>
                                <td>Marca Criada</td>
                                <td>Editar</td>
                                <td>Deletar</td>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- Looping em cada marca retornada do back-end --}}
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->quality}}</td>
                                <td>{{$brand->created_at}}</td>
                                <td><a class="btn btn-warning" href='/brand/edit/{{$brand->id}}'>Editar</a></td>
                                <td>
                                    <form action="/brand/delete/{{$brand->id}}" method="POST">
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
                        <a class='btn btn-dark ms-auto' href="/brand">Cadastrar</a>
                    </div>
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
