<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function interviewer(): HasOne
    {
        return $this->hasOne(interviewer::class, 'category_id');
    }
}
