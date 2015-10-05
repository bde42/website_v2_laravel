<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\Auth42;
use App\Models\Setting;

class BaseController extends Controller
{

	protected function home()
	{
		$setting = Setting::where('key', 'about')->first();
		return view('home')->with(['about' => $setting->value]);
	}
}
