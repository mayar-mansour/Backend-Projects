<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function registrationPage(Request $request)
    {
        return view('admin_registration_page');
    }
    public function loginPage(Request $request)
    {
        return view('admin_login_page');
    }
    public function adminRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required',
            'password' => 'required'
        ]);
        //send data to db
        $new_admin = new Admin();
        $new_admin->email = $request->email;
        $new_admin->name = $request->name;
        $new_admin->password = $request->password;


        $res = $new_admin->save();


        if ($res) {
            return back()->with('success', 'you have registred success ');
        } else {
            return back()->with('failed', 'failed smth wrong');
        }
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin  = Admin::where('email', '=', $request->email)->first();
        $pass = Admin::where('password', '=', $request->password)->first();

        if ($admin) {

            if ($pass) {

                $request->Session()->put('loginId', $admin->id);
                return view('dashboard');
            } else {
                return back()->with('failed', 'wrong password');
            }
        } else {
            return back()->with('failed', 'failed this email is not registered');
        };
    }
}
