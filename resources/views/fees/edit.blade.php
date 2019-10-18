@extends('layouts.master')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

         <div class="text-center">
         	 <h1>MicrologicX Software House & Computer College</h1>
          <h3>We Lead The World Through I.T</h3>
         </div>
         <br>
          <div class="container">
          	@include('layouts.inc.messages')
          	<form action="{{ route('fees.update' , $student_fee->id) }}" method="post"> 
          		@csrf
              @method('PUT')
          	<h3>Manage Student Fee</h3>
          	<br>
            <div class="container">
              <div class="row">
                <div class="col-md-2">
              <div class="form-group">
                <label>Reg #</label>
                 <input class="form-control" type="text"  readonly="readonly" name="reg_no" value="{{$student_fee->student_id}}">
              </div> 
              
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                <label>Name:</label>
                    <input class="form-control" value="{{$student_fee->student->name}}" type="text" name="name" id="name" disabled="disabled">
              </div>
            </div>
             <div class="col-md-4">
               <div class="form-group">
                <label>Father Name:</label>
                    <input class="form-control" value="{{$student_fee->student->father_name}}" type="text" name="father_name" id="father_name" disabled="disabled">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Course:</label>
                   <input class="form-control" readonly="readonly" type="text" name="course" id="course" value="{{$student_fee->course->name}}">
              </div>
            </div>
            
             <div class="col-md-2">
               <div class="form-group">
                <label>Total Fee:</label>
                    <input class="form-control" readonly="readonly" value="{{$student_fee->total_fee}}" type="text" name="total_fee" id="total_fee">
              </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                <label>Discount%:</label>
                    <input class="form-control" readonly="readonly" value="{{$student_fee->discount}}" type="text" name="discount" id="discount">
                    
              </div>
            </div>

            <div class="col-md-2">
               <div class="form-group">
                <label>Discounted Fee:</label>
                    <input class="form-control" readonly="readonly" type="text" name="discounted_fee" id="discounted_fee" value="{{$student_fee->discounted_fee}}">
              </div>
            </div>
             <div class="col-md-2">
               <div class="form-group">
                <label>Total Net Fee:</label>
                    <input class="form-control" readonly="readonly" type="text" name="total_net_fee" id="total_net_fee"  value="{{$student_fee->total_net_fee}}" >
              </div>
            </div>
             <div class="col-md-2">
               <div class="form-group">
                <label>Fee Paid:</label>
                    <input class="form-control" readonly="readonly" type="text" name="fee_paid" id="fee_paid" value="{{$student_fee->fee_paid}}">
              </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                <label>Remaining Fee:</label>
                    <input class="form-control" type="text" readonly="readonly" name="remaining_fee" id="remaining_fee" value="{{$student_fee->remaining_fee}}" >
              </div>
            </div>

             <div class="col-md-2">
               <div class="form-group">
                <label>Enter Fee:</label>
                    <input class="form-control" type="text"  name="new_paid" id="new_paid" >
              </div>
            </div>
              </div>
              
               <button type="submit" class="btn btn-success"><i class="fa fa-money"></i> Submit Fee</button> 
               <a href="{{ route('fees.index') }}" class="btn btn-warning"><i class="fa fa-close"></i>Close</a>
            </div>
           
        	
        	</form>
          </div>
          <br><br><br>
          <hr>
		
           <br><br>
        </main>

     @include('fees.inc._jsEditEnrollStudent')   
@endsection
   
