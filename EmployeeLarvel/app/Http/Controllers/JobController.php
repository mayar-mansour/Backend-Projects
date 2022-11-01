<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class JobController extends Controller
{
    public function addNewPosition()
    {
        return view('add_new_job');
    }

    public function AddJob(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:positions',
            'code' => 'required',

        ]);
        //send data to db
        $new_job = new Position();
        $new_job->title = $request->title;
        $new_job->code = $request->code;


        $res = $new_job->save();
        if ($res) {
            return back()->with('sucess', 'position added ');
        } else {
            return back()->with('failed', 'failed smth wrong');
        }
    }
    function fetchPositionData()
    {
        $positions = Position::all();

        // $emps = DB::table('employees')
        //     ->join('positions', 'employees.position_id', '=', 'positions.id')
        //     ->select('employees.name', 'positions.id')
        //     ->get();
        // foreach ($emps as $emp) {
        //     dump($emp->name);
        // }
        // $emps = positions::where('id')->employee()->get();
        // // $jobs = employees::where('id', 5)->get();
        // dd($emps);


        // $employees = employees::all();
        // dd($positions);
        return view('display_jobs', compact('positions'));
    }

   

    public function destroyPosition($id)
    {


        $position = Position::find($id);
        $position->delete(); // Easy right?

        return redirect('/display_jobs')->with('success', 'position removed.');
    }
    public function showJobsEmployee($id)
    {
        $position = Position::find($id);
        return view('show_employees', compact('position'));
    }
    public function editPosition($id)
    {
        $positions = Position::find($id);
        return view('edit_job', compact('positions'));
    }

    public function updatePosition(Request $request)
    {
        // dd('test');
        // $request->validate([
        //     'title' => 'required|unique:positions',
        //     'code' => 'required',

        // ]);

        $positions = Position::find($request->hidden_id);
        // dd($positions);

        $positions->title =  $request->get('title');
        $positions->code = $request->get('code');
        // $position->employee_id = $request->get('employee_id');
        $positions->save();

        return view('edit_job', compact('positions'))->with('success', 'position updated.'); // -> resources/views/stocks/index.blade.php
        // return back()->with('success', 'position updated.'); // -> resources/views/stocks/index.blade.php
    }

}
