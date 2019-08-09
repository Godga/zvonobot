<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Messages;
use App\User;

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
        $user_id = auth()->user()->id;
        $messages = Messages::where('receiver_id', '=', $user_id)->paginate('10');
        return view('home')->with('messages', $messages);
    }
}
