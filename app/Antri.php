<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antri extends Model
{
    public function data()
    {
        return $this->belongsTo(Data::class);
    }

    protected $primaryKey = 'random';
}
