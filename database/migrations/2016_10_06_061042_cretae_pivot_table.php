<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretaePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_table', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->integer('todo_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('todo_id')->references('id')->on('todos');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('pivot_table');
    }
}
