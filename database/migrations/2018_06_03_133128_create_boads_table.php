<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoadsTable extends Migration 
{
	public function up()
	{
		Schema::create('boads', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('comment');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('boads');
	}
}
