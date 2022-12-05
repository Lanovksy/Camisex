<?php
// Usado para login

namespace App\Http\Controllers;

use App\Models\Condom;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $condons = Condom::get();

        if ($user->email == 'admin@admin.com') {
            return view('home', ['condons' => $condons, 'permission' => true]);
        } else {
            return view('home', ['condons' => $condons, 'permission' => false]);
        }
    }
}
