<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('clubs'))
      {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('photo'); //Une gallerie ne serait pas mieux ?
            $table->date('creation');
            $table->string('website');
            $table->string('slack');
            $table->string('facebook');
            $table->timestamps();
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
        Schema::drop('clubs');
    }
}
