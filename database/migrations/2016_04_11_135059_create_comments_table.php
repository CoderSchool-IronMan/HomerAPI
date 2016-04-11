<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('fk_user')->unsigned();
            $table->integer('fk_estate')->unsigned();
            $table->timestamps();

            $table->foreign('fk_user')
                ->references('id')
                ->on('users');

            $table->foreign('fk_estate')
                ->references('id')
                ->on('estates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
