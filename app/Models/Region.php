<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    public function organization(){
        return $this->hasMany('App\Models\Organization');
    }
    public function user(){
        return $this->hasMany('App\Models\user');
    }
    // public function interviewer(){
    //     return $this->hasOne('App\Models\interviewer');
    // }
    /**
     * Get the user associated with the Region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function interviewer(): HasOne
    {
        return $this->hasOne(interviewer::class, 'region_id');
    }
}
