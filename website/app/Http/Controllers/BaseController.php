<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\Auth42;
use App\Models\Setting;
use App\Models\ClubPost;

class BaseController extends Controller
{

	protected function home()
	{
		$bigevent = [];
		$settings = Setting::all();
		
		foreach ($settings as $setting) {
			
			$arr = ['name' => $setting['name'], 'value' => $setting['value']];

			if (substr($setting['key'], 0, 3) === "be-")
				$bigevent[$setting['key']] = $arr;
			else
				$other[$setting['key']] = $arr;
		}
		
		//BEAUCOUPS D'APPELS A LA BDD, CERTES EN HAUT C'EST PAS FORCEMENT MIEUX, de tout facon faudra faire un systeme de "event mis en avant" en faisant les events.
		/*
		$about = Setting::where('key', 'about')->first();
		$bigevent["main-photo"] = Setting::where('key', 'be-main-photo')->first()->value;
		$bigevent["bg-photo"] = Setting::where('key', 'be-bg-photo')->first()->value;
		$bigevent["title"] = Setting::where('key', 'be-title')->first()->value;
		$bigevent["label"] = Setting::where('key', 'be-label')->first()->value;
		$bigevent["description"] = Setting::where('key', 'be-description')->first()->value;
		$bigevent["link"] = Setting::where('key', 'be-link')->first()->value;
		$agenda = Setting::where('key', 'agenda')->first()->value;
		$posts = ClubPost::all();
		return view('home')->with([
			'about' => $about->value,
			'posts' => $posts,
			'bigevent' => $bigevent,
			'agenda' => $agenda]);
	*/
		$posts = ClubPost::all();
		return view('home')->with(['posts' => $posts, 'bigevent' => $bigevent,
			'other' => $other]);
	}
}
