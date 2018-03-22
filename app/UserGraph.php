<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGraph extends Model
{
    protected $table = 'user_graph_setup';

    protected $fillable = ['user_id','graph_id','graph_name','column_name','excell_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
