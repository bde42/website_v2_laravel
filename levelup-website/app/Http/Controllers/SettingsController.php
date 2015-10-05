<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use \Redirect;

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

    /**
     * Update a specified setting in the dashboard.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $setting = Setting::find($request->get('id'));
        if (isset($setting))
        {
            $type = $request->get('type');
            $value = $request->get('value');
            if (isset($type) && $type == 'boolean')
                $setting->value = (isset($value)) ? true : false;
            else if (isset($type) && $type == 'integer')
                $setting->value = intval($value);
            else
                $setting->value = $value;
            $setting->save();
            return Redirect::route('admin::settings')->with('success', 'The setting has been successfully updated');
        }
        return Redirect::route('admin::settings')->with('error', "The setting you tried to edit wasn't registered in the database");
    }
}
