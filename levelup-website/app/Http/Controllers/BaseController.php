<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\Auth42;

class BaseController extends Controller {

	public function __construct()
	{
    	$this->middleware('auth', ['except' => ['home']]);
		$this->middleware('auth.club:editor', ['only' => ['test']]);
	}

	protected function home()
	{
		return view('welcome');
	}
	
	protected function test()
	{
		return view('welcome');
	}
}