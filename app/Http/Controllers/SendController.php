<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Mail\Test as TestMail;
use itstep\Models\EmailSendSettingsModel as Settings;
use itstep\User as UserModel;
use itstep\Models\ListModel;
use itstep\Jobs\SendEmail as SendEmailJob;


class SendController extends Controller
{
    //
    public function form(){
        $lists=UserModel::find(\Auth::user()->id)->lists()->get();
        return view('send.form',['lists'=>$lists]);
    }

    public function send(Request $request){
    	dispatch(new SendEmailJob(//запускает работу
            $request->get('list_id'),
            $request->get('message'),
            $request->get('subject'),
            \Auth::id()
        ));
    }

    public function showsettings(){
        $types=\DB::table('email_send_types')->get();
        $setting=Settings::where('user_id',\Auth::id())->first()->type()->value('type');
        return view('send.settings',['types'=>$types,'setting'=>$setting]);
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
