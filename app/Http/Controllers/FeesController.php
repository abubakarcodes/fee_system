<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\Fee;
use PDF;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $courses = Course::all();
        $students = Student::orderBy('id' , 'DESC')->get();
    
        return view('fees.index' , compact('courses' , 'students'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rules= [
            'student_id' => 'required',
            'course_id' =>  'required',
            'total_fee' => 'required',
            'discount' => 'required',
            'discounted_fee' => 'required',
            'fee_paid' => 'required',
            'remaining_fee' => 'required',
            'total_net_fee' => 'required',

       ];


       $this->validate($request , $rules);

       Fee::create([
        'student_id' => $request->input('student_id'),
        'course_id' => $request->input('course_id'),
        'total_fee' => $request->input('total_fee'),
        'discount' => $request->input('discount'),
        'discounted_fee' => $request->input('discounted_fee'),
        'total_net_fee' => $request->input('total_net_fee'),
        'fee_paid' => $request->input('fee_paid'),
        'remaining_fee' => $request->input('remaining_fee'),
       ]);
       return redirect()->back()->with('success' , 'your student has been Enrolled');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_fee = Fee::findOrFail($id);
       $pdf = PDF::loadView('fees.printFeeSlip', compact('student_fee'));
        return $pdf->download($student_fee->student_id.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $student_fee = Fee::findOrFail($id);
        return view('fees.edit' , compact('student_fee'));
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
          $rules= [
            'total_fee' => 'required',
            'discount' => 'required',
            'discounted_fee' => 'required',
            'fee_paid' => 'required',
            'remaining_fee' => 'required',
            'total_net_fee' => 'required',
            'new_paid' => 'required',
       ];


       $this->validate($request , $rules);

       $student_fee = Fee::findOrFail($id);

       $student_fee->update([
        'total_fee' => $request->input('total_fee'),
        'discount' => $request->input('discount'),
        'discounted_fee' => $request->input('discounted_fee'),
        'total_net_fee' => $request->input('total_net_fee'),
        'fee_paid' => $request->input('fee_paid') + $request->input('new_paid'),
        'remaining_fee' => $request->input('remaining_fee') - $request->input('new_paid'),
       ]);
       return redirect()->back()->with('success' , 'your student fee has been submitted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_fee = Fee::findOrFail($id);
        $student_fee->delete();
        return redirect()->back()->with('success' , 'student fee has been deleted');
    }
}
