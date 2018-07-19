<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\User;
use Auth;
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
    public function index()
    {
        $user=User::find(Auth::id());
        $todo=$user->todos()->latest()->paginate(4);
        return view('home')->with(['todos'=>$todo]);
    }
}
