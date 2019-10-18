<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Student;
use App\Course;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $students = Student::orderBy('id' , 'DESC')->get();
        $student_ref = Student::pluck('id')->max();
        $student_ref = $student_ref + 1;
        return view('students' , compact('students' , 'student_ref' , 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $rules = [  
                    'name' => 'required',
                    'father_name' => 'required' ,
                    'gender' => 'required',
                    'birth_date' => 'required',
                    'cnic' => 'required',
                    'contact' => 'required',
                    'courses' => 'required',
                    'address' => 'required',
                   

                    ];


    $this->validate($request , $rules);

    if(!empty($request->file('picture'))){
        //getting file name of uploaded photo
        
        $filenameWithExt = $request->file('picture')->getClientOriginalName();
         //getting file extension to upload image
         $fileExtention = $request->file('picture')->getClientOriginalExtension();
         //filename without extention
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //filename to store
          $fileNameToStore = $filename . '_' . time() . '.' . $fileExtention;
          //path to store
          $path = $request->file('picture')->storeAs('/public/storage/', $fileNameToStore);
    }

     

    

    Student::Create([
          
            'date' => $request->input('date'),
           'picture' =>  isset($fileNameToStore) ? $fileNameToStore : "student.jpg",
            'name' => $request->input('name'),
           'father_name' => $request->input('father_name'),
           'gender' => $request->input('gender'),
           'cnic' =>  $request->input('cnic'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'father_contact' => $request->input('father_contact'),
            'expertise' => $request->input('expertise'),
            'referral' => $request->input('referral'),
           'address' => $request->input('address'),
           'birth_date' => $request->input('birth_date'),
           'courses' => implode(',' , $request->input('courses')),
            
    ]);

    return redirect()->back()->with('success' , 'Student has been successfully register');



       
    }

    public function show($id){
        $student = Student::findOrFail($id);
        return view('student' , compact('student'));
    }

    public function studentPrint($id){
        $student = Student::findOrFail($id);
        $pdf = PDF::loadView('student', compact('student'));
        return $pdf->download($student->name.'.pdf');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $courses = Course::all();
        $student = Student::findOrFail($id);
        return view('editStudent' , compact('student' , 'courses'));
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
        $rules = [ 
                    'name' => 'required',
                    'father_name' => 'required' ,
                    'gender' => 'required',
                    'birth_date' => 'required',
                    'cnic' => 'required',
                    'contact' => 'required',
                    'address' => 'required',
                   

                    ];


    $this->validate($request , $rules);

        $student = Student::findOrFail($id);
     //getting file name of uploaded photo
        if($request->has('picture')){
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
         //getting file extension to upload image
         $fileExtention = $request->file('picture')->getClientOriginalExtension();
         //filename without extention
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //filename to store
          $fileNameToStore = $filename . '_' . time() . '.' . $fileExtention;
          //path to store
          $path = $request->file('picture')->storeAs('/public/storage/', $fileNameToStore);
        }
        

    

    $student->update([
          
            'date' => $request->input('date'),
           'picture' =>  isset($fileNameToStore) ? $fileNameToStore : $student->picture,
            'name' => $request->input('name'),
           'father_name' => $request->input('father_name'),
           'gender' => $request->input('gender'),
           'cnic' =>  $request->input('cnic'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'father_contact' => $request->input('father_contact'),
            'expertise' => $request->input('expertise'),
            'referral' => $request->input('referral'),
           'address' => $request->input('address'),
           'birth_date' => $request->input('birth_date'),
           'courses' => implode(',' , $request->input('courses')),
            
    ]);

    return redirect()->back()->with('success' , 'Student has been successfully updated');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success' , 'Student Has been deleted');
    }
}
