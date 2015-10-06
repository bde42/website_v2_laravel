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

        Setting::create(['key' => 'about', 'name' => 'A propos du BDE', 'value' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam"]);
        Setting::create(['key' => 'be-main-photo', 'name' => "Photo de l'event à la une", 'value' => "http://bde.42.fr/main.jpg"]);
        Setting::create(['key' => 'be-bg-photo', 'name' => "Arrière plan de l'event à la une", 'value' => "http://bde.42.fr/branding.jpg"]);
        Setting::create(['key' => 'be-label', 'name' => "Label de l'event à la une", 'value' => "Eté 2015"]);
        Setting::create(['key' => 'be-title', 'name' => "Titre de l'event à la une", 'value' => "#JePeuxPasJaiPiscine"]);
        Setting::create(['key' => 'be-description', 'name' => "Résumé de l'event à la une", 'value' => "Pour vous aider, nous vous avons préparé une carte des environs, bon courage !"]);
        Setting::create(['key' => 'be-link', 'name' => "Lien de l'event à la une", 'value' => "url"]);
        Setting::create(['key' => 'agenda', 'name' => "Agenda de la semaine", 'value' => ""]);
    }
}
