<?php

namespace itstep\Http\Controllers;

use Illuminate\Http\Request;
use itstep\Models\ListModel;
use itstep\User as UserModel;
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
        $lists=UserModel::find(\Auth::user()->id)->lists()->paginate(2);
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
        'List '.$list->name.' successfulle created']);
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
    public function update(Request $request, $id)
    {
        //
        $list=ListModel::findOrFail($id);
        $list->fill($request->only([
            'name'
            ]));
        $list->save();
        $up=\Lang::get('lists.update');//перевод сообщений!
        return redirect('/lists')->with(['flash_message'=>'List '.$list->name.' successfully '.$up]);
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
        'List '.$list->name.' successfulle deleted']);
    }
}
