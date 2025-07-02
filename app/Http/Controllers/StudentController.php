<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $uid = auth()->user()->id;
        $user = User::find($uid);
        return view('students.index')->with('students', $user->students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
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
     */
    public function show(int $id): View
    {
        $data = Student::findOrFail($id);
        return view('students.view')->with('student', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View|RedirectResponse
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
     */
    public function update(Request $request, int $id): RedirectResponse
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
     */
    public function destroy(int $id): RedirectResponse
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
