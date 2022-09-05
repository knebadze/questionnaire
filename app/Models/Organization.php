<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasMany('App\Models\User');
    }
    public function questionnaire(){
        return $this->hasMany('App\Models\Questionnaire');
    }
    public function region(){
        return $this->belongsTo('App\Models\Region');
    }
}
