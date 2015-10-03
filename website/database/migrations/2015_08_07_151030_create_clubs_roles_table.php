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
				$table->string('nickname');
				$table->integer('club_id')->unsigned();
				$table->integer('role_id')->unsigned();
				
				$table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
				$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
				
				/*
				$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
				$table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
				$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
				*/
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
