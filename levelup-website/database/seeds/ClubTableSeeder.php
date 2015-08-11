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
		'name' => "Level'UP",
		'slug' => 'level-up',
		'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
        'photo' => 'https://scontent-ams3-1.xx.fbcdn.net/hphotos-xap1/v/t1.0-9/934736_314254778734727_4954772019685029478_n.png?oh=8e3e56732cfeb8ef0c71df443c43c61b&oe=563A0045',
		'website' => 'bde.42.fr',
        'facebook' => 'https://www.facebook.com/42.levelup',
		'slack' => 'bde'
		));

        Club::create(array(
		'name' => "Rugby42",
		'slug' => 'rugby42',
		'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
        'photo' => 'https://scontent-ams3-1.xx.fbcdn.net/hphotos-xta1/t31.0-8/10626436_534070536731308_3775425591585128876_o.png',
		'website' => 'http://www.rc42.fr/',
        'facebook' => 'https://www.facebook.com/rugby42',
		'slack' => 'rugby42'
		));
    }
}
