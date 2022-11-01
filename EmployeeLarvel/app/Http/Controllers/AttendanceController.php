<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\Employee;

use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AttendanceController extends Controller
{
    public function checkIn(Request $request)
    {

        $data = Employee::where('id', '=', Session::get('loginId'))->first();

        $attendance = new Attendance();
        $attendance->employee_id =  $data->id;
        // $attendance->date = $request->date;
        $attendance->check_in_out = 'check_in';


        $attendance->time_in_out = Carbon::now('GMT+8')->format('Y/m/d H:i:s');
        // dd(Carbon::now('GMT+8')->format('Y/m/d H:i:s'));
        $attendance->save();

        // attendances::create($input);
        return view('employee_profile', compact('data'));
    }
    public function checkOut(Request $request)
    {

        $data = Employee::where('id', '=', Session::get('loginId'))->first();

        $attendance = new Attendance();
        $attendance->employee_id =  $data->id;
        // $attendance->date = $request->date;
        $attendance->check_in_out = 'check_out';


        $attendance->time_in_out = Carbon::now('GMT+8')->format('Y/m/d H:i:s');
        $attendance->save();

        // attendances::create($input);
        return view('employee_profile', compact('data'));
    }

    public function listOfAttendances()
    {
        // $attends = attendances::where('id')->get();
        $attends = Attendance::all();
        // dd($jobs);
        return view('list_of_attendances', compact('attends'));
    }
}
