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
		$bde_id = DB::table('clubs')->where('slug', 'bde')->value('id');
		$arcade42_id = DB::table('clubs')->where('slug', 'arcade-42')->value('id');

		if (!empty($admin)) {
			DB::table('website_roles')->insert(
				array(
					array('nickname' => 'fkalb', 'role_id' => $admin),
					array('nickname' => 'rapasti', 'role_id' => $admin),
				)
			);
			if (!empty($bde_id)) {
				DB::table('clubs_roles')->insert(
					array(
						array('nickname' => 'qudevide', 'club_id' => $bde_id, 'role_id' => $admin),
						array('nickname' => 'hkhelifa', 'club_id' => $bde_id, 'role_id' => $admin),
						array('nickname' => 'carfaoui', 'club_id' => $arcade42_id, 'role_id' => $admin),
					)
				);
			}
		}
    }
}
