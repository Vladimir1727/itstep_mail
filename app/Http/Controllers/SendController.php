<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Mail\Test as TestMail;
use itstep\Models\EmailSendSettingsModel as Settings;
<<<<<<< HEAD
=======
use itstep\User as UserModel;
use itstep\Models\ListModel;
use itstep\Jobs\SendEmail as SendEmailJob;
>>>>>>> master

class SendController extends Controller
{
    //
    public function form(){
        $lists=UserModel::find(\Auth::user()->id)->lists()->get();
    	return view('send.form',['lists'=>$lists]);
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
    	//$mail=new TestMail($request->get('message'),
    		//$request->get('subject');
    	//\Mail::to($request->get('to'))->send($mail);
        //\Mail::to($request->get('to'))->queue($mail);
        //$when=\Carbon\Carbon::now()->addMinutes(1);//устанавливаем отсрочку
        //\Mail::to($request->get('to'))->later($when,$mail);//постановка в очередь с отсрочкой

        /*$listSubscribers=ListModel::findOrFail($request->get('list_id'))->subscribers()->get();
        foreach ($listSubscribers as $subscriber) {
            $mail=$mail=new TestMail($request->get('message'),
            $request->get('subject'));
            \Mail::to($subscriber->email)->send($mail);
        }*/
        dispatch(new SendEmailJob(//запускает работу
            $request->get('list_id'),
            $request->get('message'),
            $request->get('subject'),
            \Auth::id()
        ));
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
