<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\Subscriber as SubscriberModel;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //вызывает форму для добавления
        return view('subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //добавляет подписчика
        $this->validator($request->all())->validate();
        SubscriberModel::create([
            'user_id'=>\Auth::user()->id,
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email')
        ]);
    }

    public function lists(){
        $data['list']=SubscriberModel::where('user_id',\Auth::user()->id)->get()->toArray();
        return view('subscribers.list',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo "show ".$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo "edit ".$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo "update ".$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo "destroy ".$id;
    }

    protected function validator(array $data){//ручной  валидотор
        return \Validator::make($data,[
            'first_name'=>'required|max:128|min:2',
            'last_name'=>'required|max:128|min:2',
            'email'=>'required|email|max:256'
        ]);
    }
}
