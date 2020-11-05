<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class , 'id','user_id');
    }

    public function project(){
        return $this->hasOne(Project::class , 'id','project_id');
    }
}
