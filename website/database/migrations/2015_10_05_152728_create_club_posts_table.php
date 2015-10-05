<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('club_posts'))
        {
          Schema::create('club_posts', function (Blueprint $table) {
              $table->increments('id')->unsigned();
              $table->integer('club_id');
              $table->string('title');
              $table->longText('content');
              $table->string('author');
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
        Schema::drop('club_posts');
    }
}
