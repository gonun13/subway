<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();;
            $table->bigInteger('meal_id')->unsigned();;
            $table->string('bread');
            $table->string('bread_size');
            $table->enum('baked', ['yes', 'no']);
            $table->string('taste');
            $table->string('extras');
            $table->text('vegetables');
            $table->string('sauce');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('meal_id')
                ->references('id')->on('meals')
                ->onDelete('cascade');
            $table->unique(['user_id', 'meal_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
