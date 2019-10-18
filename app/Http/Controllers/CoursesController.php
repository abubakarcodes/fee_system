<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses' , compact('courses'));
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request , [
            'name' => 'required'
       ]);


       Course::create([

        'name' => $request->input('name'),

       ]);


       return redirect()->back()->with('success' , 'Course has been successfully added');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $course = Course::findOrFail($id);
       return view('editCourse' , compact('course'));
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
         $this->validate($request , [
            'name' => 'required'
       ]);

        $course = Course::findOrFail($id);
        $course->update([

        'name' => $request->input('name'),

       ]);


       return redirect()->back()->with('success' , 'Course has been successfully updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
       
            $course->delete();
            return redirect()->back()->with('success' , 'course has been delete');
        
    }
}
