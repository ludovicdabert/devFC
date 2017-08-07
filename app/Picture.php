<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function robot(){
        return $this->belongsTo(Robot::class);
    }
}
