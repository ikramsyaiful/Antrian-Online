<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{

    public function antri()
    {
        return $this->hasMany(Antri::class,'fk_id');
    }

    public function core()
    {
        return $this->belongsTo(Core::class);
    }

}
