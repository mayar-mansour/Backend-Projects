<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;

use App\Models\Position;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    function login(Request $request)
    {
        if (Auth::guard('employee')->check()) {
            return redirect('/profile');
        } else {
            
        return view('employee_login');
        }
    }


    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // $user  = Employee::where('email', '=', $request->email)->where('password', '=', $request->password)->first();

        // // $user  = employees::where('email', '=', $request->email)->first();
        // $pass = Employee::where('password', '=', $request->password)->first();

        // if ($user) {

        //     if ($pass) {

        //         $request->Session()->put('loginId', $user->id);
        //         return redirect()->route('profile');
        //     } else {
        //         return back()->with('failed', 'wrong password');
        //     }
        // } else {
        //     return back()->with('failed', 'failed this email is not registered');
        // };
        // $credentials = $request->only('email', 'password');
        // dd($credentials);
        $employees = Employee::paginate(5);
        $auth = Employee::loginAdmin($request);
        // dd($auth);

        if ($auth) {
            return redirect()->route('profile', compact('employees'));
        } else {
            return back()->with('failed', 'smth wrong');
        }
    }

    function profile(Request $request)
    {
        // $data = array();
    
        $currentTime = Carbon::now('GMT+8')->format('H:i:s');
        // // dd(Session::has('loginId'));
        // if (Session::has('loginId')) {

        //     $data = Employee::where('id', '=', Session::get('loginId'))->first();

        // dd($data->attendance->last()->toArray());
        // dd($data->attendances->last()->check_in_out);
        // $id = Auth::id();
        $data= Auth::user();
        // dd($user);
        return view('employee_profile', compact('data', 'currentTime'));
    }
    function profileDetails(Request $request)
    {
        // $employees = Employee::paginate(5);
        $data= Auth::user();
        // dd($data->attendance);
        $attends = Attendance::where('employee_id', auth()->user()->id)->paginate(2);
        // $data->paginate(2)
        
      
     
        return view('show_user_details', compact('data', 'attends' ));
    }

    // return redirect('login')->with('success', 'you are not allowed to access');

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}
