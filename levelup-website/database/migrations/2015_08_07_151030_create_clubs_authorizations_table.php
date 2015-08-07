<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('clubs_authorizations'))
		{
			Schema::create('clubs_authorizations', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('user_id')->unsigned();
				$table->integer('club_id')->unsigned();
				$table->integer('role_id')->unsigned();
				
				$table->foreign('user_id')->references('id')->on('users');
				$table->foreign('club_id')->references('id')->on('clubs');
				$table->foreign('role_id')->references('id')->on('clubs_roles');
				
				/*
				$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
				$table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
				$table->foreign('role_id')->references('id')->on('clubs_roles')->onDelete('cascade');
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
        Schema::drop('clubs_authorizations');
    }
}
