<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index($id){
    	return $id;
    }
}
