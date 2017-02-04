<?php
namespace itstep\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListModel extends Model
{
	use SoftDeletes;
	protected $table="lists";//указание с какой таблицей работать вручную
	protected $fillable=['user_id','name'];
}
