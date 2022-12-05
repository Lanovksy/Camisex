{{-- Página onde cria e edita marcas --}}

@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" >

{{-- Section para renderizar dentro da página principal da navbar --}}
@section('content')
<div class="d-flex justify-content-center" style='min-height: calc(100vh - 355px)'>
    <div class="col-md-8 mb-5" style='max-width: 800px'>
            <div class="card">

                {{-- Se for admin, aparece tudo isso, se não aparece sem permissão --}}
                @if($permission)
            <div class="card">
                <div class="card-header">
                    @if(Request::is('*/edit/*'))Editar Marca @else Criar Marca @endif</div>

                <div class="card-body">
                    @if(Request::is('*/edit/*'))
                    <form action="{{ url('brand/update') }}/{{ $brand->id }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="name" value='{{$brand->name}}' class="form-control" id="nome" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="qualidade" class="form-label">Qualidade</label>
                            <select id="qualidade" name="quality" value='{{$brand->quality}}' class="form-control">
                                <option value="Excelente">Excelente</option>
                                <option value="Boa">Boa</option>
                                <option value="Mediana">Mediana</option>
                                <option value="Ruim">Ruim</option>
                                <option value="Péssima">Péssima</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a type="submit" class="btn btn-dark" href="brands">Voltar</a>
                            <button type="submit" class="btn btn-dark">Salvar</button>
                        </div>
                    </form>
                    @else

                    {{-- A partir do else, caso o ID for nulo, estará renderizando o formulário que cria marca --}}

                    <form action="{{ url('brand/create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="nome" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="qualidade" class="form-label">Qualidade</label>
                            <select name="quality" class="form-control">
                                <option value="Excelente">Excelente</option>
                                <option value="Boa">Boa</option>
                                <option value="Mediana">Mediana</option>
                                <option value="Ruim">Ruim</option>
                                <option value="Péssima">Péssima</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a type="submit" class="btn btn-dark" href="brands">Voltar</a>
                            <button type="submit" class="btn btn-dark">Salvar</button>
                        </div>
                    </form>
                    @endif
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
