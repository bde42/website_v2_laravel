<?php

use App\Models\Role;
use App\Models\ClubRole;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the roles table seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->delete();
		DB::table('clubs_roles')->delete();
		
		DB::table('roles')->insert(
			array(
				array('name' => 'member'),
				array('name' => 'admin'),                                
			)
		);
		
		DB::table('clubs_roles')->insert(
			array(
				array('name' => 'member'),
				array('name' => 'editor'),
				array('name' => 'admin'),                                
			)
		);
    }
}
