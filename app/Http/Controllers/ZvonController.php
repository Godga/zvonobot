<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZvonController extends Controller
{
    public function index(){
		return view('rl.index');
	}
    public function register(){
		return view('rl.register');
	}
}
