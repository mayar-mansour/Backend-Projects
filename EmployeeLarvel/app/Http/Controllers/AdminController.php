<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function registrationPage(Request $request)
    {
        return view('admin_registration_page');
    }
    public function loginPage(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/dashboard');
        } else {
            return view('admin_login_page');
        }
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


        // $remember = $request->input('remember_token');
        // dd($remember);

        $auth = Admin::login($request);
        // dd(Auth::viaRemember());
        if ($auth) {

            return redirect()->route("admin.dashboard");
        }

        // if ($admin) {

        //     if ($pass) {

        //         return view('dashboard');
        //     } else {
        //         return back()->with('failed', 'wrong password');
        //     }
        // } else {
        //     return back()->with('failed', 'failed this email is not registered');
        // };
    }

    public function logoutAdmin()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login_page');
    }

    function adminprofile(Request $request)
    {

        $data = Auth::user();
        dd($data);
        return view('dashboard', compact('data'));
    }
}
