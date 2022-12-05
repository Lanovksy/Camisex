<?php
//Contem apénas uma função para pegar os usuário cadastrados no sistema

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get_users()
    {
        $user = auth()->user();
        $users = User::with(['orders'])->get();

        if ($user->email == 'admin@admin.com') {
            return view('User.ListUser', ['users' => $users, 'permission' => true]);
        } else {
            return view('User.ListUser', ['users' => $users, 'permission' => false]);
        }
    }
}
