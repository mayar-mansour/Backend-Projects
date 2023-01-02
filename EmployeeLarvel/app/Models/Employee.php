<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

use App\Models\Position;
use App\Models\Attendance;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $guard = 'employee';

    static function loginAdmin($request)
    {
        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember_me');
        return Auth::guard('employee')->attempt($credentials, $remember_me);
    }


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

    // public function save(array $options = [])
    // {
    //     if (!$this->exists && empty($this->getAttribute('password'))) {
    //         $this->password = 1234;
    //     }
    //     return parent::save($options);
    // }

    // public function setPasswordAttribute($value)
    // {
    //     if (!empty($value)) {
    //         $this->attributes['password'] = Hash::make($value);
    //     }
    // }
}
