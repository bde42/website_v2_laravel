<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        Setting::create(['key' => 'about', 'name' => 'A propos du BDE', 'value' => "string|Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam"]);
        Setting::create(['key' => 'maintenance', 'name' => 'Maintenance', 'value' => "boolean|false"]);
        Setting::create(['key' => 'pagination', 'name' => 'Clubs par page', 'value' => "integer|15"]);
    }
}
