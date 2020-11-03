<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    protected $guarded = [];

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function user(){
        return $this->hasOne(User::class , 'id');
    }
}
