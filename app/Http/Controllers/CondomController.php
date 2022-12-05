<?php
// Controle geral das camisinhas, onde faz o CRUD(Criar, Listar, Editar, Deletar)

namespace App\Http\Controllers;

use App\Http\Requests\CondomRequest;
use App\Models\Brand;
use App\Models\Condom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CondomController extends Controller
{
    public function view_condom()
    {
        $user = auth()->user();
        $brands = Brand::get();

        if ($user->email == 'admin@admin.com') {
            return view('Condom.CreateCondom', ['brands' => $brands, 'permission' => true]);
        } else {
            return view('Condom.CreateCondom', ['brands' => $brands, 'permission' => false]);
        }
    }

    public function create_condom(CondomRequest $request)
    {
        $data = $request->validated();
        $condom = new Condom();
        $condom->fill($data);

        $img = $request->file('file');
        $name = uniqid('img_') . '.' . $img->getClientOriginalExtension();
        $condom->file = $img->storeAs('condoms', $name, ['disk' => 'public']);
        $condom->save();

        return Redirect::to('/condons');
    }

    public function get_condons()
    {
        $user = auth()->user();
        $condom = Condom::with(['brand'])->get();
        if ($user->email == 'admin@admin.com') {
            return view('Condom.ListCondom', ['condons' => $condom, 'permission' => true]);
        } else {
            return view('Condom.ListCondom', ['condons' => $condom, 'permission' => false]);
        }
    }

    public function get_edit_condom($id)
    {
        $user = auth()->user();
        $condom = Condom::where('id', '=', $id)->with(['brand'])->first();
        $brands = Brand::get();

        if ($user->email == 'admin@admin.com') {
            return view('Condom.CreateCondom', ['condom' => $condom, 'brands' => $brands, 'permission' => true]);
        } else {
            return view('Condom.CreateCondom', ['condom' => $condom, 'brands' => $brands, 'permission' => false]);
        }
    }

    public function update_condom(CondomRequest $request, $id)
    {
        $data = $request->validated();
        $condom = Condom::find($id);
        $condom->fill($data);

        $img = $request->file('file');
        $name = uniqid('img_') . '.' . $img->getClientOriginalExtension();
        $condom->file = $img->storeAs('condoms', $name, ['disk' => 'public']);
        $condom->save();

        return Redirect::to('/condons');
    }

    public function delete_condom($id)
    {
        $condom = Condom::find($id);
        $condom->delete();
        return Redirect::to('/condons');
    }
}
