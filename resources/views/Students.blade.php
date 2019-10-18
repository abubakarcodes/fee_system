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
          	<form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data"> 
          		@csrf
          		
          	<div class="row">

          		<div class="col-md-4">
          			<div class="form-group">
          			<label>Ref No:</label>
                    <input class="form-control" type="text" readonly="readonly" name="ref_no" value="{{$student_ref}}">
          		</div>
          		</div>
          		
          	</div>
          	<br>
          	<h3>Registeration Form</h3>
          	<br>
          	<div class="row">
          		<div class="col-md-4">
          			<div class="form-group">
          			<label>Date: </label>
          			<input class="form-control" type="date" name="date" value="{{date('Y-m-d')}}">
          		</div>
          		</div>
          		<div class="col-md-8">
          			<div class="form-group">
          				<label>Picture:</label>
          				<input value="{{old('picture')}}" type="file" name="picture" class="form-control-file">
          			</div>
          			

          		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Name:</label>
					<input type="text" value="{{old('name')}}" name="name" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
					<label>Gender:</label>
					<select name="gender" class="form-control">
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
        		    </div>
        		</div>
        		
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Father Name:</label>
					<input  value="{{old('father_name')}}" type="text" name="father_name" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Date of Birth:</label>
					<input type="date"  value="{{old('birth_date')}}" name="birth_date" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>CNIC:</label>
					<input type="number"  value="{{old('cnic')}}" name="cnic" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Mobile No:</label>
					<input type="tel"  value="{{old('contact')}}" name="contact" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Father Mobile No:</label>
					<input type="tel"  value="{{old('father_contact')}}" name="father_contact" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Email:</label>
					<input type="email" value="{{old('email')}}"  name="email" class="form-control">
          		    </div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Expertise:</label>
					<textarea  name="expertise" class="form-control">{{old('expertise')}}</textarea>
          		    </div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Referral Person:</label>
					<input class="form-control" type="text" name="referral" value="{{old('referral')}}">
          		</div>	
        		</div>

        		<div class="col-md-12">
        			<div class="form-group">
          			<label>Address:</label>
					<textarea name="address" class="form-control">{{old('address')}}</textarea>
          		    </div>	
        		</div>
        		<div class="col-md-12">
        			<label>Select Courses:</label>
        			<br>
              @foreach ($courses as $course)
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="courses[]" value="{{$course->name}}"> {{$course->name}}
                </label>
               </div>
              @endforeach
        		
					
					
					
					
					
				
					
					
        		</div>

        	</div>
				<br>
        	<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
        	</form>
          </div>
          <br><br><br>
          <hr>
			<h1>Registered Students</h1>
      <br>
      <div class="row">
        <div class="table-responsive">
            <table  id="myTable" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Reg#</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Father</th>
                  <th>Cnic</th>
                  <th>Contact</th>
                  <th>Courses</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($students as $student)
                  <tr>
                  <td>{{$student->id}}</td>
                  <td>{{$student->date}}</td>
                  <td>{{$student->name}}</td>
                  <td>{{$student->father_name}}</td>
                  <td>{{$student->cnic}}</td>
                  <td>{{$student->contact}}</td>
              

                  <td>
                    <ol>
                      @foreach(explode( "," , $student->courses) as $course)
                      <li>{{$course}}</li>
                      @endforeach
                    </ol>
                    

                  </td>
                  <td><a style="display: inline"  class="btn btn-outline-success btn-sm" href="{{ route('students.show' , $student->id) }}" ><i class="fa fa-eye"></i></a>
                    <a  style="display: inline" class="btn btn-outline-primary btn-sm" href="{{ route('students.edit' , $student->id) }}"><i class="fa fa-edit"></i></a>
                    <form style="display: inline" method="post" action="{{ route('students.destroy' , $student->id) }}">
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
           <br><br>
        </main>

        
@endsection
   
