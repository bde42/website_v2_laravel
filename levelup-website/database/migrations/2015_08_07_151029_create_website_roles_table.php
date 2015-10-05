<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('website_roles'))
		{
			Schema::create('website_roles', function (Blueprint $table) {
				$table->increments('id');
				$table->string('nickname');
				$table->integer('role_id')->unsigned();
				
				$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
				
				/*
				$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('website_roles');
    }
}
