<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Mail\Test as TestMail;

class SendController extends Controller
{
    //
    public function form(){
    	return view('send.form');
    }

    public function send(Request $request){
    	/*\Mail::raw($request->get('message'),
    		function ($message) use ($request){
    			$message->to($request->get('to'))
    				->subject($request->get('subject'));
    		});*/
    		
    	/*$data=['text'=>$request->get('message')];
    		//$data=['text'=>'сообщение'];
    	\Mail::send('emails.test',$data,
    		function ($message) use ($request){
    			$message->to($request->get('to'))
    				->subject($request->get('subject'));
    		});*/
    	$mail=new TestMail($request->get('message'),
    		$request->get('subject'));
    	\Mail::to($request->get('to'))->send($mail);

    }
}
