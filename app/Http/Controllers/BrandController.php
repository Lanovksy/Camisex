<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function view_brand()
    {
        //Função que

        //Recuperando usuário logado
        $user = auth()->user();

        //Verificação se usuário é admin e retorno das permissões como true ou false
        if ($user->email == 'admin@admin.com') {
            return view('Brand.CreateBrand', ['permission' => true]);
        } else {
            return view('Brand.CreateBrand', ['permission' => false]);
        }
    }

    //Função que cria uma nova marca
    public function create_brand(BrandRequest $request)
    {
        //Validação de marca de acordo com o BrandRequest
        $data = $request->validated();
        //Instanciando classe de marca
        $brand = new Brand();
        //Preenchendo marca com o array retornado da validação acima, logo após usamos o save para completar a ação
        $brand->fill($data)->save();
        //Caso tudo ocorra bem, o usuário é redirecionado pela tela onde está a lista de marcas
        return Redirect::to('/brands');
    }

    //Função que recupera os registros para listagem
    public function get_brands()
    {
        //Recuperando usuário logado
        $user = auth()->user();
        //Recuperando todas as marcas salvas no banco com o método get();
        $brands = Brand::get();

        //Verificação se usuário é admin e retorno das permissões como true ou false
        if ($user->email == 'admin@admin.com') {
            return view('Brand.ListBrand', ['brands' => $brands, 'permission' => true]);
        } else {
            return view('Brand.ListBrand', ['brands' => $brands, 'permission' => false]);
        }
    }

    //Função que carrega as informações de determinada marca e retorna o fourmulário de edição com os dados
    public function get_edit_brand($id)
    {
        //Recuperando usuário logado
        $user = auth()->user();
        //Recuperando uma determinada marca de acordo com o ID enviado do Front-End
        $brand = Brand::findOrFail($id);

        //Verificação se usuário é admin e retorno das permissões como true ou false
        if ($user->email == 'admin@admin.com') {
            return view('Brand.CreateBrand', ['brand' => $brand, 'permission' => true]);
        } else {
            return view('Brand.CreateBrand', ['brand' => $brand, 'permission' => false]);
        }
    }

    //Função que atualiza por definitivo determinada marca de acordo com seu ID
    public function update_brand(BrandRequest $request, $id)
    {
        //Validação de marca de acordo com o BrandRequest
        $data = $request->validated();
        //Recuperando uma determinada marca de acordo com o ID enviado do Front-End
        $brand = Brand::findOrFail($id);
        //Preenchendo marca com o array retornado da validação acima, logo após usamos o save para completar a ação
        $brand->fill($data)->save();
        //Caso tudo ocorra bem, o usuário é redirecionado pela tela onde está a lista de marcas
        return Redirect::to('/brands');
    }

    //Função que deleta uma marca de acordo com seu ID
    public function delete_brand($id)
    {
        //Recuperando uma determinada marca de acordo com o ID enviado do Front-End
        $brand = Brand::findOrFail($id);
        //Deletando a respectiva marca de acordo com o que foi achado
        $brand->delete();
        //Caso tudo ocorra bem, o usuário é redirecionado pela tela onde está a lista de marcas
        return Redirect::to('/brands');
    }
}
