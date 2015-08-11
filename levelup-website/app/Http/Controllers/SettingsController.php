<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the settings in the dashboard.
     *
     * @return Response
     */
    public function edit()
    {
        $settings = Setting::all();
        return view('settings.edit', ['settings' => $settings]);
    }
}
