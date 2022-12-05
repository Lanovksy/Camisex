<?php
//Controle para gerenciar os pedidos do usuário quando clicam no botão de comprar

namespace App\Http\Controllers;

use App\Models\Condom;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{

    public function create_order($id)
    {
        $user = auth()->user();
        $condom = Condom::findOrFail($id);
        $condom->quantity = $condom->quantity - 1;
        $condom->save();

        $order = new Order();
        $order->fill(['user_id' => $user->id, 'condom_id' => $condom->id])->save();

        return Redirect::to('/orders');
    }

    public function get_orders()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', '=', $user->id)->with(['user', 'condom'])->get();
        return view('Order.ListOrder', ['orders' => $orders]);
    }

    public function get_admin_orders()
    {
        $orders = Order::get();
        return view('Order.ListAllOrder', ['orders' => $orders]);
    }
}
