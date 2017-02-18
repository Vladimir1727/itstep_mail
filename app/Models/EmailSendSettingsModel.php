<?php

namespace itstep\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSendSettingsModel extends Model
{
    //
    protected $table="email_send_settings";
    public $timestamps = false;
    protected $fillable=['user_id','type_send_id'];
}
