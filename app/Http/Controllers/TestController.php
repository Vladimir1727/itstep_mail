<?php

namespace itstep\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Http\Request;
//use itstep\Migration\CreateUsersTable;
//use itstep\database\migrations\CreateUsersTable;
//use Illuminate\Database\Migrations\CreateUsersTable;
//use itstep\CreateUsersTable;

class TestController extends Controller
{
    public function index(){
    	Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
