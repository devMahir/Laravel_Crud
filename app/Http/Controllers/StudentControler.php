<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $students = Student::all();
        return view('welcome', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required',
            'phone'     => 'required',
        ]);
        
        $student = new Student; //to call model

        $student->firstname = $request->firstname;
        $student->lastname   = $request->lastname;
        $student->email      = $request->email;
        $student->phone      = $request->phone;
        $student->save();
        return redirect('/')->with('studentAddMess', 'Student Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit', compact('student'));
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
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required',
            'phone'     => 'required',
        ]);

        $student = Student::find($id); //to call model

        $student->firstname = $request->firstname;
        $student->lastname   = $request->lastname;
        $student->email      = $request->email;
        $student->phone      = $request->phone;
        $student->save();
        return redirect('/')->with('studentAddMess', 'Student Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        return redirect('/')->with('studentAddMess', 'Student Deleted Successfully');
    }
}
