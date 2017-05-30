<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('department_id')->after('remember_token')->unsigned();
            $table->boolean('admin')->default(0)->after('department_id');
            $table->integer('approved')->default(0)->after('admin');

            $table->foreign('department_id')->references('id')->on('departments');
            
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
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('department_id');
            $table->dropColumn('admin');
            $table->dropColumn('approved');
        });
    }
}