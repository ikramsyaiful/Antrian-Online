<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Core extends Model
{
    public function data()
    {
        return $this->hasMany(Data::class,'fk_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
