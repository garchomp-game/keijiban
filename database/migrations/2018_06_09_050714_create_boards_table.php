<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardsTable extends Migration
{
	public function up()
	{
		Schema::create('boards', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->string('title');
            $table->text('description');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('boards');
	}
}
