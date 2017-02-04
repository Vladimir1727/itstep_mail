<?php

namespace itstep\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//подключаем "мягкое" удаление

class Subscriber extends Model
{	

	use SoftDeletes;//подключаем трейт

    protected $fillable=['user_id','first_name','last_name','email'];//куда разрешается записывать
}
