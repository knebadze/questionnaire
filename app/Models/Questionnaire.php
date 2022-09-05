<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    public function questionnairebody(){
        return $this->hasMany('App\Models\QuestionnaireBody');
    }
    public function user(){
        return $this->hasMany('App\Models\User');
    }
    public function organization(){
        return $this->hasMany('App\Models\Organization');
    }
    public function questionnairelist(){
        return $this->hasMany('App\Models\QuestionnaireList');
    }
}
