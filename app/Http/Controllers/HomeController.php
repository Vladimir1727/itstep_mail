<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\Subscriber;
use itstep\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = \Auth::user()->email;
        return view('home',['userEmail'=>$email]);
    }

    public function logout()
    {
        \Auth::logout();
        return view('auth/login');
    }

    public function model(){
        /*Subscriber::create([
            'user_id'=>\Auth::user()->id,
            'first_name'=>'John',
            'last_name'=>'doe',
            'email'=>'john_doe@mail.com'
            ]);*/

        /*$sub1= new Subscriber();
        $sub1->user_id=\Auth::user()->id;
        $sub1->first_name='Ivan';
        $sub1->last_name='Ivanovich';
        $sub1->email="ivan@i.ua";
        $sub1->save();*/
        //$subscriberId=3;
        //$subscriber=Subscriber::find($subscriberId);//ищет по Id
        //$subscriber=Subscriber::findOrFail($subscriberId);//при ошибке возврашает "404 страница не найдена"
        //$subscriber->email='john_doe+1@mail.com';
        //$subscriber->save();
        //echo '<pre>'.print_R(Subscriber::where('first_name', 'John')->first(),true).'</pre>';//first() возвращает первый элемент класса
        //echo '<pre>'.print_R(Subscriber::where('first_name', 'John')->get()->toArray(),true).'</pre>';//восвращает массив
        //echo Subscriber::where('first_name', 'John')->toSql();//возвращает в каком виде отправляется запрос
        //Subscriber::find(3)->delete();//удаляет запись
        echo '<pre>'.
        print_r(Subscriber::onlyTrashed()->get(),true)//показывает только удалённые
        .'</pre>';
        Subscriber::onlyTrashed()->find(4)->restore();//восстанавливает
        // ->forceDelete()  полное удаление
    }
}
