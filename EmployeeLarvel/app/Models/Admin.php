<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Cookie;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    use HasFactory;

    static function login($request)
    {
        
        $remember = $request->has('remember') ? true : false;
      
        // $remember = true;
        // $remember = Input::get('remember');
        // dd($remember);
        $credentials = $request->only('email', 'password');
        // $remember = $request->input('remember');
        return  Auth::guard('admin')->attempt($credentials , $remember);
    }
}
