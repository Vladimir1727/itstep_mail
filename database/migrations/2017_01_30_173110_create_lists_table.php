<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();//значение больше нуля
            $table->string('name',128);
            $table->timestamps();//время создания и обновления
            $table->softDeletes();//время удаления
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
        Schema::dropIfExists('lists');
    }
}
