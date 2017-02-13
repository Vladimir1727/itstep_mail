<?php
namespace itstep\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use itstep\Models\Subscriber as Subscriber;

class ListModel extends Model
{
	use SoftDeletes;
	protected $table="lists";//указание с какой таблицей работать вручную
	protected $fillable=['user_id','name'];
	public function subscribers(){
		return $this->belongsToMany('itstep\Models\Subscriber','list_subscribers','list_id','subscriber_id');
	}
}
