<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function user(request $request)
	{
		print_r($request->input());
		$name = $request->input('name');
		$email = $request->input('email');
		$password = $request->input('password');
		$rp_password = $request->input('repeat_password');
	}
}
