<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interviewer extends Model
{
    use HasFactory;
    public function region(){
        return $this->belongsTo('App\Models\region');
    }
    public function category(){
        return $this->belongsTo('App\Models\category');
    }

}
