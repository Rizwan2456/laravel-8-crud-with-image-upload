<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students=Student::get();
        
        return view('read',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required'
            
        ]);
        $student=new Student();
        $student->name=$request->name;
        $student->email=$request->email;

        if ($request->hasfile('image')) {
            $img= $request->file('image');
            $imgName = time() . "." . $img->getClientOriginalExtension();
            $img->move('image/', $imgName);
            $student->image=$imgName;
        }
        $student->save();
        
        return redirect(Route('students.create'))->with('status', 'record successfully subimitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
       
        return view('update', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $student->name=$request->name;
        $student->email=$request->email;

        if ($request->hasfile('image')) {
            $path='image/'.$student->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $img= $request->file('image');
            $imgName = time() . "." . $img->getClientOriginalExtension();
            $img->move('image/', $imgName);
            $student->image=$imgName;
        }
        $student->update();
        return redirect(Route('students.index'))->with('status', 'record successfully upadted');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $path='image/'.$student->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $student->delete();
        return redirect(Route('students.index'))->with('status', 'record successfully deleted');
    }
}
