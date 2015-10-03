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
		
		DB::table('roles')->insert(
			array(
				array('name' => 'administrator'),
				array('name' => 'moderator'),
				array('name' => 'community_manager'),
				array('name' => 'member'),
			)
		);
		
		$admin = DB::table('roles')->where('name', 'administrator')->value('id');
		$levelup = DB::table('clubs')->where('slug', 'level-up')->value('id');
		print_r($levelup);
		if (!empty($admin)) {
			DB::table('website_roles')->insert(
				array(
					array('nickname' => 'fkalb', 'role_id' => $admin),
					array('nickname' => 'rapasti', 'role_id' => $admin),
				)
			);
			if (!empty($levelup)) {
				DB::table('clubs_roles')->insert(
					array(
						array('nickname' => 'qudevide', 'club_id' => $levelup, 'role_id' => $admin),
						array('nickname' => 'hkhelifa', 'club_id' => $levelup, 'role_id' => $admin),
					)
				);
			}
		}
    }
}
