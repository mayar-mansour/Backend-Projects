<?php


namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;

use App\Models\Position;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use App\Http\Controllers\bcrypt;

$positions = Position::all();
class EmployeeController extends Controller
{

    public function dashboard()
    {

        $Positions = Position::count();
        $employees = Employee::count();
        // $pinCount = Pin::count();

        return view('dashboard', compact('Positions', 'employees'));
    }


    public function registartion()
    {
        $positions = Position::all();

        return view('registration_employee', compact('positions'));
    }
    public function registartionEmp(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // post create for each input ,then stored into input variable and request all
        $input = $request->all();
        // $input->password =Crypt::encrypt($request->get('name'));
        $input = new Employee();
        $input->name = $request->name;
        $input->position_id = $request->position_id;
        $input->email = $request->email;
        $input->adress = $request->adress;
        $input->phone = $request->phone;
        $input->birthdate = $request->birthdate;
        $input->date_hired = $request->date_hired;
        $input->password = bcrypt($request->password);


        if ($image = $request->file('image')) {
            // new image path
            $destinationPath = 'image/';
            // change the image name by the name related to date
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            // get your data from profileImage
            $input['image'] = "$profileImage";
            // $input->image = "$profileImage";
        }


        $input->save();
        return redirect('admin.dashboard')
            ->with('success', 'employee added successfully.');
    }


    function fetchEmployeeData()
    {
        // $employees = Employee::all();
        $positions = Position::all();
        // $jobs = DB::table('positions')
        //     ->join('employees', 'positions.id', '=', 'employees.position_id')
        //     ->select('positions.title', 'employees.id')
        //     ->get();
        // foreach ($jobs as $job) {
        //     dump($job->title);
        // }
        // $jobs = employees::where('id')->position()->get();
        $jobs = Employee::where('id', 5)->get();
        $employees = Employee::paginate(5);
        // dd($jobs);
        return view('display_employee', compact('employees', 'positions', 'jobs'));
    }
    public function showEmployee($id)
    {
        $employees = Employee::find($id);
        // $attends = Attendance::where('employee_id', Employee::id())->get();
        $attends = Attendance::where('employee_id', $employees->id)->paginate(2);
        // $attends = $employees->attendance()->get();

        // $test= $attends->paginate(2);
        // dd($attends);

        return view('show_employee_details', compact('employees', 'attends'));
    }
    // public function pageIndex()
    // {
    //     $employees = Employee::paginate(2);
    //     dd("test");
    //     return view('show_employee_details', compact('employees'));
    // }
    public function destroyEmployee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/display_employee')->with('success', 'employee removed.');  // -> resources/views/stocks/index.blade.php
    }

    public function editEmployee($id)
    {
        $employees = Employee::find($id);
        $positions = Position::all();
        return view('edit_employee', compact('employees', 'positions'));
    }

    public function updateEmployee(Request $request)
    {
        $positions = Position::all();
        $employees = Employee::find($request->id);


        $employees->name =  $request->get('name');
        $employees->email = $request->get('email');
        $employees->password = Hash::make($request['password']);
        $employees->adress = $request->get('adress');
        $employees->phone = $request->get('phone');
        $employees->birthdate = $request->get('birthdate');
        $employees->date_hired = $request->get('date_hired');
        $employees->position_id = $request->get('position_id');

        if ($image = $request->file('image')) {
            // new image path
            $destinationPath = 'image/';
            // change the image name by the name related to date
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            // get your data from profileImage
            $employees['image'] = "$profileImage";
        }

        $employees->save();

        // return view('/edit_employee', compact('employees', 'positions'))->with('success', 'employee updated.');
        return back()->with('success', 'employee updated.');
    }
    public function employeeSearch(Request $request)
    {
        $employees = Employee::all();
        // $positions = Position::all();
        if ($request->has('search')) {
            $employees =  Employee::where('name', 'like', '%' . $request['search'] . '%')->orwhere('email', 'like', '%' . $request['search'] . '%')->get();
            // $positions =  Position::where('title', 'like', '%' . $request['search'] . '%')->get();
            // dd($employees);
        }
        return view('display_employee', compact('employees'));
    }
}
