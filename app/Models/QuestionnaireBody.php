<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireBody extends Model
{
    use HasFactory;
    protected $fillable = [
        'questionnaire_id',
        'product_type',
        'unit',
        'base_month',
        'previous_month',
        'current_month',
        'comment',
    ];
    public function questionnaire(){
        return $this->hasMany('App\Models\Questionnaire');
    }
}
