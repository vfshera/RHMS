<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function contractor(){
        return $this->hasOne(User::class , 'id', 'contractor_id');
    }

    public function engineer(){
        return $this->hasOne(User::class , 'id', 'engineer_id');
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }
}
