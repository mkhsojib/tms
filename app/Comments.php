<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        "user_id","coach_id","file_upload_loger_id","message"
    ];
}
