<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title', 30)->nullable(false);
          $table->string('content', 100)->nullable();
          $table->dateTime('deadline')->nullable();
          $table->integer('importance')->nullable();
          $table->boolean('completion_flg')->nullable(false);
          $table->string('created_by')->nullable();
          $table->string('updated_by')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
