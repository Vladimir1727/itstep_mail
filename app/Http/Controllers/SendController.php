<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Mail\Test as TestMail;
use itstep\Models\EmailSendSettingsModel as Settings;

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

    public function showsettings(){
        $types=\DB::table('email_send_types')->get();
        return view('send.settings',['types'=>$types]);
    }

    public function setsettings(Request $request){
        $is_set=Settings::where('user_id',\Auth::id())->first();
        if (!$is_set){//нет настроек
            $set=new Settings;
            $set->type_send_id=$request->type;
            $set->user_id=\Auth::id();
            $set->save();
        }
        else{//есть настройки
            $set=$is_set;
            $set->type_send_id=$request->type;
            $set->save();
        }
        return redirect()->back();
    }
}
