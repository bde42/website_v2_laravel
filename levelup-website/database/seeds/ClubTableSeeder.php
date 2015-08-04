<?php

use App\Models\Club;
use Illuminate\Database\Seeder;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the clubs table seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('clubs')->delete();
		
		Club::create(array(
		'name' => "Level'Up",
		'slug' => 'level-up',
		'description' => 'Le BDE',
		'website' => 'bde.42.fr',
		'slack' => 'https://42born2code.slack.com/messages/bde'
		));
    }
}
