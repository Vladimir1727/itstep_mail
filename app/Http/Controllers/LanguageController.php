<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LanguageController extends Controller
{
    //
    public function chooser(){
    	//echo Input::get('locale');
    	\Session::put('locale',Input::get('locale'));
    	return redirect()->back();
	}
}