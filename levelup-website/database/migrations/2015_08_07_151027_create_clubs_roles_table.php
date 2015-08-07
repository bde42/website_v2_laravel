<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clubs_roles'))
		{
        	Schema::create('clubs_roles', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name', 32)->unique();
			});
		}
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('clubs_roles');
    }
}
