<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('lists', function (Blueprint $table) {
            //создаёт связь
            $table->foreign('user_id','FK_lists__users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::table('lists', function (Blueprint $table) {
            //удаляем связь
            $table->dropForeign('FK_lists__users');
        });
    }
}
