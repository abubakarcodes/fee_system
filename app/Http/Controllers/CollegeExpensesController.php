<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CollegeExpense;

class CollegeExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debits = CollegeExpense::where('amount' , '>' , 0)->get();
        $credits = CollegeExpense::where('amount' , '<' , 0)->get();
        $total_debit = CollegeExpense::where('amount' , '>' , 0)->sum('amount');
        $total_credit = CollegeExpense::where('amount' , '<' , 0)->sum('amount');
        $total_cash = $total_debit + $total_credit;
       return view('expenses.index' , compact('debits' , 'credits' , 'total_debit' , 'total_credit' , 'total_cash'));
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
    {
        $rules = [

                'date' => 'required',
                'amount' => 'required',
                'narration' => 'required',
                'entry_type' => 'required',
        ];


        $this->validate($request , $rules);

        if($request->input('entry_type') == 'debit'){
            CollegeExpense::create([

            'date' => $request->input('date'),
            'amount' => $request->input('amount'),
            'narration' => $request->input('narration'),

        ]);
        }else{
            CollegeExpense::create([

            'date' => $request->input('date'),
            'amount' => -1 * ($request->input('amount')),
            'narration' => $request->input('narration'),

        ]);
        }


        return redirect()->back()->with('success' , 'Amount has been added');


        



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
