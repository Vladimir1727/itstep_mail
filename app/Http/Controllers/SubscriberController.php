<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\Subscriber as SubscriberModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use itstep\Http\Requests\Subscribers\Create as CreateRequest;

class SubscriberController extends Controller
{

    public function index()
    {
        //
        $data['list']=SubscriberModel::where('user_id',\Auth::user()->id)->get()->toArray();
        return view('subscribers.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //вызывает форму для добавления
        return view('subscribers.create',['subscriber'=>new SubscriberModel()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        SubscriberModel::create([
            'user_id'=>\Auth::user()->id,
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email')
        ]);
        $data['list']=SubscriberModel::where('user_id',\Auth::user()->id)->get()->toArray();
        return view('subscribers.list',$data);
    }


     /** Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

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
        $Subscriber=SubscriberModel::findOrFail($id);
        return view('subscribers.create',['subscriber'=>$Subscriber]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRequest $request, $id)
    {
        
        $Subscriber=SubscriberModel::find($id);
        $Subscriber['first_name']=$request->get('first_name');
        $Subscriber['last_name']=$request->get('last_name');
        $Subscriber['email']=$request->get('email');
        $Subscriber->save();
        $data['list']=SubscriberModel::where('user_id',\Auth::user()->id)->get()->toArray();
        return view('subscribers.list',$data);
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
        $Subscriber=SubscriberModel::find($id);
        $Subscriber->delete();
        $data['list']=SubscriberModel::where('user_id',\Auth::user()->id)->get()->toArray();
        return view('subscribers.list',$data);
    }
}
