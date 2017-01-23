<?php

namespace itstep\Http\Controllers\Photos;

use Illuminate\Http\Request;
use itstep\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(){
    	return 'Photo Test Controller';
    }
}
