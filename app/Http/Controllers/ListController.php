<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\ListModel;
use itstep\User as UserModel;
use itstep\Models\Subscriber as SubscriberModel;
use itstep\Http\Requests\Lists\Create as CreateRequest;//подключаем запрос вручную

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists=UserModel::find(\Auth::user()->id)->lists()->paginate(10);
        return view('lists.index',['lists'=>$lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lists.create',['list'=>new ListModel()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        //
        $list=ListModel::create([
            'user_id'=>\Auth::user()->id,
            'name'=>$request->get('name')
            ]);
        //$mess=\LanguageController::chooser();
        return redirect('/lists')->with(['flash_message'=>
        'List '.$list->name.' '.\Lang::get('lists.mess_create')]);
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
        $list=ListModel::findOrFail($id);
        $subscribers=SubscriberModel::find(\Auth::user()->id)->paginate(5);
        $list_subscribers=$list->subscribers()->get();
        
        return view('lists.show',['subscribers'=>$subscribers,'list'=>$list,'list_subscribers'=>$list_subscribers]);
    }

    public function addsubscriber(Request $request){
        $subscriber=SubscriberModel::findOrFail($request->subscriber_id);
        $list=ListModel::findOrFail($request->list_id);
        if (null ==($list->subscribers()->find($request->subscriber_id)))
            $list->subscribers()->attach($request->subscriber_id);
        return redirect()->back();
    }

    public function delsubscriber(Request $request){
        $list=ListModel::findOrFail($request->list_id);
        $list->subscribers()->detach($request->subscriber_id);
        return redirect()->back();   
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
        $list=ListModel::findOrFail($id);
        return view('lists.create',['list'=>$list]);
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
        //
        $list=ListModel::findOrFail($id);
        $list->fill($request->only([
            'name'
            ]));
        $list->save();
        $update=\Lang::get('lists.mess_update');//перевод сообщений!
        return redirect('/lists')->with(['flash_message'=>'List '.$list->name.' '.$update]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListModel $list)
    {
        //
        $list->delete();
        return redirect()->back()->with(['flash_message'=>
        'List '.$list->name.' '.\Lang::get('lists.mess_delete')]);
    }
}
