<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = auth()->user()->id;
        $user = User::find($uid);
        // $students = Student::all();
        return view('students.index')->with('students', $user->students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 
        $request->validate([
            'name' => 'bail|required|unique:students',
            'roll' => 'required|unique:students',
            'registration' => 'required|unique:students',
            'email' => 'required|unique:students'
        ]);
        */

        Student::insert([
            'user_id' => Auth::id(),
            'name' => $request->full_name,
            'roll' => $request->roll_num,
            'registration' => $request->reg_num,
            'email' => $request->email,
            'phone' => $request->mobile,
            'religion' => $request->religion,
            'birthdate' => $request->birth,
            'gender' => $request->gender,
            'blood_group' => $request->blood,
            'address' => $request->address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        return back()->with('success', 'Student Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::findOrFail($id);
        return view('students.view')->with('student', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::findOrFail($id);
        if(Auth::user()->id == $data->user_id){
            return view('students.edit')->with('student', $data);
        }else{
            return redirect()->route('students')->with('warning', 'You have not permission to do that...!!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Student::where('id', $id)->update([
            'name' => $request->full_name,
            'roll' => $request->roll_num,
            'registration' => $request->reg_num,
            'email' => $request->email,
            'phone' => $request->mobile,
            'religion' => $request->religion,
            'birthdate' => $request->birth,
            'gender' => $request->gender,
            'blood_group' => $request->blood,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ]);
        
        return redirect()->route('students')->with('success', 'Student Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stu = Student::find($id);
        if(Auth::user()->id == $stu->user_id){
            $stu->delete();
            return redirect()->route('students')->with('danger', 'Student Deleted');
        }else{
            return redirect()->route('students')->with('warning', 'You have not permission to do that...!!');
        }
    }
}
