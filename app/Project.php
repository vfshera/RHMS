<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function contractor(){
        return $this->hasOne(Contractor::class);
    }

    public function engineer(){
        return $this->hasOne(Engineer::class);
    }

    public function ratings(){
        return $this->hasMany(Contractor::class);
    }

    public function applications(){
        return $this->hasMany(Contractor::class);
    }
}
