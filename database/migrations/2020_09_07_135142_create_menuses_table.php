<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuses', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('title',100);
            $table->float('price', 6, 2);
            $table->integer('weight');
            $table->integer('meat');
            $table->text('about');
            $table->timestamps();
            $table->foreign('id')->references('menu_id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menuses');
    }
}
