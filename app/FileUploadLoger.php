<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUploadLoger extends Model
{
    //
    protected $table = 'file_upload_loger';
    protected $fillable = [
        "week_name","user_id","uploaded_time"
    ];

    protected $dates = [
        "uploaded_time"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function playersInformation()
    {
        return $this->hasMany(Player::class,'file_upload_loger','id');
    }


}
