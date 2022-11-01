<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
// Laravel uses the Hash facade which provides a secure way for storing passwords in a hashed manner.
// use Hash;
// use Session;

class UserController extends Controller
{
    public function registartion()
    {
        return view('registartion');
    }

    function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        return view('login');
    }
    public function registartionUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|min:5|max:12',
        ]);
        //send data to db
        $user_login = new User();
        $user_login->email = $request->email;
        $user_login->name = $request->name;
        $user_login->password = $request->password;
        $res = $user_login->save();
        if ($res) {
            return back()->with('sucess', 'you have registred ');
        } else {
            return back()->with('failed', 'failed smth wrong');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        // if (!Auth::attempt($credentials)) {
        //     // dd(-Auth::attempt($credentials));
        //     return redirect()->intended('dashboard');
        // }
        $user  = User::where('email', '=', $request->email)->where('password', '=', $request->password)->first();
        // $request->Session()->put('loginId', $user->id);
       // $pass = User::where('password', '=', $request->password)->first();




        if ($user) {
            // dd(!Auth::check($request->password, $user->password));
            // if (!Hash::check($request->password, $user->password)) {
           // if ($pass) {

                $request->Session()->put('loginId', $user->id);
                return redirect()->route('dashboard');
           // } else {
            //    return back()->with('failed', 'wrong password');
           // }
        } else {
            return back()->with('failed', 'failed this email is not registered');
        };
    }


    function dashboard()
    {
        $data = array();
        if (Session::has('loginId')) {

            $data = User::where('id', '=', Session::get('loginId'))->first();
            // dd($data->name);
        }

        //  The compact() function is used to convert given variable to to array
        return view('dashboard', compact('data'));
    }

    // return redirect('login')->with('success', 'you are not allowed to access');

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}

