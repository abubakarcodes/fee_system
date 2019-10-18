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
          	<form action="{{ route('fees.store') }}" method="post"> 
          		@csrf
          	<h3>Enroll Student</h3>
          	<br>
            <div class="container">
              <div class="row">
                <div class="col-md-2">
              <div class="form-group">
                <label>Reg #</label>
                 <select name="student_id" id="student_id"  class="form-control">
                  <option value="">-- Reg # --</option>
                  @foreach ($students as $student)
                    <option value="{{$student->id}}" data-father="{{$student->father_name}}" data-student="{{$student->name}}">{{$student->id}}</option>
                  @endforeach
                   
                 </select>
              </div> 
              
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                <label>Name:</label>
                    <input class="form-control" type="text" name="name" id="name" disabled="disabled">
              </div>
            </div>
             <div class="col-md-4">
               <div class="form-group">
                <label>Father Name:</label>
                    <input class="form-control" type="text" name="father_name" id="father_name" disabled="disabled">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Select Course:</label>
                   <select name="course_id" id="course_id" class="form-control">
                    <option value="">--Select Course--</option>
                  @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                  @endforeach
                   
                 </select>
              </div>
            </div>
            
             <div class="col-md-2">
               <div class="form-group">
                <label>Total Fee:</label>
                    <input class="form-control" type="text" name="total_fee" id="total_fee">
              </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                <label>Discount%:</label>
                    <input class="form-control" type="text" name="discount" id="discount">
                    <div id="discount_alert" hidden="hidden" style="color: red;">must be less than 100%</div>
              </div>
            </div>

            <div class="col-md-2">
               <div class="form-group">
                <label>Discounted Fee:</label>
                    <input class="form-control" readonly="readonly" type="text" name="discounted_fee" id="discounted_fee">
              </div>
            </div>
             <div class="col-md-2">
               <div class="form-group">
                <label>Total Net Fee:</label>
                    <input class="form-control" readonly="readonly" type="text" name="total_net_fee" id="total_net_fee">
              </div>
            </div>
             <div class="col-md-2">
               <div class="form-group">
                <label>Fee Paid:</label>
                    <input class="form-control" type="text" name="fee_paid" id="fee_paid">
              </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                <label>Remaining Fee:</label>
                    <input class="form-control" type="text" readonly="readonly" name="remaining_fee" id="remaining_fee">
              </div>
            </div>
              </div>
              
               <button type="submit" class="btn btn-success"><i class="fa fa-user"></i> Enroll Student</button> 
            </div>
           
        	
        	</form>
          </div>
          <br><br><br>
          <hr>
			<h1>Enrolled Students</h1>
      <br>
       @foreach ($courses as $course)
       <div class="text-center">
          <h1>{{$course->name}}</h1>
        </div>
        <br>
      <div class="row">        
        <div class="table-responsive">

            <table  class="myTable" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Reg #</th>
                  <th>Name</th>
                  <th>Father Name</th>
                  <th>Total Fee</th>
                  <th>Fee Paid</th>
                  <th>Remaining Fee</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($course->fees as $fee)
                <tr>
                  <td>{{$fee->student->id}}</td>
                  <td>
                  {{$fee->student->name}}
                  </td>
                  <td>
                  {{$fee->student->father_name}}
                  </td>
                  <td>{{$fee->total_net_fee}}</td>
                   <td>{{$fee->fee_paid}}</td>
                    <td>{{$fee->remaining_fee}}</td>
                        <td><a style="display: inline"  class="btn btn-outline-success btn-sm" href="{{ route('fees.show' , $fee->id) }}" ><i class="fa fa-file-pdf-o"></i></a>
                    <a  style="display: inline" class="btn btn-outline-primary btn-sm" href="{{ route('fees.edit' , $fee->id) }}"><i class="fa fa-money"></i></a>
                    <form style="display: inline" method="post" action="{{ route('fees.destroy' , $fee->id) }}">
                      @csrf
                      @method('delete')
                      <button class="btn btn-outline-danger btn-sm"  type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
      </div>
      <hr><br><br>
      @endforeach
           <br><br>
        </main>

     @include('fees.inc._jsEnrollStudent')   
@endsection
   
