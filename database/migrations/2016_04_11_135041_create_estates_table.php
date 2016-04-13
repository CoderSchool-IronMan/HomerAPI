<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('fk_location')->unsigned();
            $table->integer('fk_address')->unsigned();
            $table->integer('fk_user')->unsigned();
            $table->timestamps();

            $table->foreign('fk_address')
                ->references('id')
                ->on('addresses');

            $table->foreign('fk_location')
                ->references('id')
                ->on('locations');

            $table->foreign('fk_user')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estates');
    }
}
