<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Position;
use App\Models\Attendance;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id', 'name', 'email', 'password', 'phone', 'adress', 'birthdate', 'date_hired', 'image'
    ];

    protected $with = ['position'];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
    public function attendance()

    {

        return $this->hasMany(Attendance::class, 'employee_id');
    }

    public function save(array $options = [])
    {
        if (!$this->exists && empty($this->getAttribute('password'))) {
            $this->password = Str::random(4);
        }
        return parent::save($options);
    }

    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}
