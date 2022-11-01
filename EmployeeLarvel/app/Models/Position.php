<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    
    protected $fillable = [
            'id','code','title'
    ];
    // protected $with = ['employee'];
    // public function employee()
    // {
    //     return $this->belongsTo('App\employees');
    // }
    public function employees()

    {

        return $this->hasMany(Employee::class,'position_id');
    }


}
