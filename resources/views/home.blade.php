@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" >

@section('content')
<div class="container bg-white rounded shadow">
    <div class="row p-5 mb-5 justify-content-center align-items-center" style="min-height: calc(100vh - 200px)">
        <div class="col-md-6 bg-red">
            <h2 class='display-2'>O MELHOR LUGAR PARA COMPRAR</h2>
            <p class='lead mt-5'><em>"Relato para encher uma linguiçinha Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fames ac turpis egestas sed tempus."</em></p>
        </div>
        <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{asset('storage/condoms/neon.jpg')}}" class="d-block w-100" alt="..."/>
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset('storage/condoms/canabis.jpg')}}" class="d-block w-100" alt="..."/>
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset('storage/condoms/postinho.png')}}" class="d-block w-100" alt="..."/>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    </div>
</div>
<div class="d-flex text-center bg-dark text-white p-5 mt-5">
    <div class="row m-auto">
        <div class="col-lg-4 col-12">
            <div class="d-flex justify-content-center align-items-center" style="border-bottom: 2px solid #daa520">
                <img src="{{asset('storage/assets/estrelas.png')}}" style='width: 150px; height: 100px' alt="..."/>
                <p class="lead mt-3">15.732 Avaliações</p>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="d-flex justify-content-center align-items-center" style="border-bottom: 2px solid #daa520;">
                <img src="{{asset('storage/assets/loja.png')}}" style='width: 150px; height: 100px' alt="..."/>
                <p class="lead mt-3">134.895 Vendas Mensais em Média</p>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="d-flex justify-content-center align-items-center" style="border-bottom: 2px solid #daa520">
                <img src="{{asset('storage/assets/zap.png')}}" style='width: 150px; height: 100px' alt="..."/>
                <p class="lead mt-3">(11) 4002 - 8922</p>
            </div>
        </div>
    </div>
</div>
<div class="container bg-white rounded shadow my-5">
    <div class="text-center p-5">
        <h2 class='display-4'>Produtos para você!</h2>
        <p class='lead'><em>As melhores opções selecionadas com base no seu gosto</em></p>
    </div>

    <div class="d-flex justify-content-center">
    @if(count($condons) > 0)
        @foreach ($condons as $condom)
        <div class="col-3 bg-dark rounded hvr-grow text-white m-3 mb-5">
            <div class="card-condom">
                <img src="{{asset('storage/'.$condom->file.'')}}" alt="..."/>
                <div class="mt-3 card-condom-body">
                    <h6 class="lead">{{$condom->name}}</h6>
                    <div class="d-flex">
                        <p class="lead">R$: {{$condom->price}},00</p>
                        @if ($condom->quantity == 0)
                        <p class="lead ms-3">Produto Indisponível</p>
                        @else
                        <p class="lead ms-3">Disponível {{$condom->quantity}}</p>
                        @endif
                    </div>
                    <p>{{$condom->description}}</p>
                    <form action="{{url('/order/create/'.$condom->id.'')}}" class="modal-footer" method="POST">
                    @csrf
                      <button @disabled($condom->quantity == 0) type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Comprar
                      </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <h6 class="text-center mb-3 bg-dark">Sem camisinhas no momento</h6>
      @if($permission)
        <a class="btn btn-dark" href="/condom">Cadastrar Camisinhas</a>
      @endif
    @endif
</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-body">
                <p class='lead'>Compra concluida com sucesso</p>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection
@extends('layouts.footer')
