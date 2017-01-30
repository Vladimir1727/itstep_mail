<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyListSubscribers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('list_subscribers', function (Blueprint $table) {
            //создаёт связь
            $table->foreign('list_id','FK_list_subscribers__lists')->references('id')->on('lists');
            $table->foreign('subscriber_id','FK_list_subscribers__subscribers')->references('id')->on('subscribers');
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
        Schema::table('list_subscribers', function (Blueprint $table) {
            //удаляем связь
            $table->dropForeign('FK_list_subscribers__lists');
            $table->dropForeign('FK_list_subscribers__subscribers');
        });
    }
}
