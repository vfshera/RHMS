<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = [];

    public function project(){
        return $this->hasOne(Project::class);
    }
}
