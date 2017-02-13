<?php

namespace itstep\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//подключаем "мягкое" удаление
//use itstep\Models\ListModel as List;

class Subscriber extends Model
{	

	use SoftDeletes;//подключаем трейт

    protected $fillable=['user_id','first_name','last_name','email'];//куда разрешается записывать

    public function lists(){
		return $this->belongsToMany('itstep\Models\ListModel','list_subscribers','subscriber_id','list_id');
	}
}
