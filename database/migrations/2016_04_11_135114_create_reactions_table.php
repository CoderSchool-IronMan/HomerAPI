<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->enum('action_type', ['like', 'dislike', 'report']);
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
        Schema::drop('reactions');
    }
}
