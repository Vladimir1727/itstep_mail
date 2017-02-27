<?php

namespace itstep\Models;

use Illuminate\Database\Eloquent\Model;
//use itstep\Models\EmailSendType;

class EmailSendSettingsModel extends Model
{
    //
    protected $table="email_send_settings";
    public $timestamps = false;
    protected $fillable=['user_id','type_send_id'];
    public function type(){
    	return $this->belongsTo('itstep\Models\EmailSendType','type_send_id');
    }
}
