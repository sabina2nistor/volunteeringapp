<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;


class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->integer('department_id')->unsigned();
            $table->date('begin_date');
            $table->date('end_date');
            $table->timestamps();


            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['department_id']);
        Schema::dropIfExists('projects');
    }
}