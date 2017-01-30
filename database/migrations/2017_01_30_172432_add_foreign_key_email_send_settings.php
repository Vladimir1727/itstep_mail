<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyEmailSendSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('email_send_settings', function (Blueprint $table) {
            //создаёт связь
            $table->foreign('type_send_id','FK_email_send_settings__email_send_types')->references('id')->on('email_send_types');
            $table->foreign('user_id','FK_email_send_settings__users')->references('id')->on('users');
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
        Schema::table('email_send_settings', function (Blueprint $table) {
            //удаляем связь
            $table->dropForeign('FK_email_send_settings__email_send_types');
            $table->dropForeign('FK_email_send_settings__users');
        });
    }
}
