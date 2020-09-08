<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->integer('customers');
            $table->integer('employees');
            $table->bigInteger('menu_id')->unsigned();
            $table->timestamps();
            $table->foreign('menu_id')->references('id')->on('menuses');
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants', function (Blueprint $table) {
            $table->dropUnique(['menu_id']);
            $table->dropForeign(['menu_id']);
        });
    }
}