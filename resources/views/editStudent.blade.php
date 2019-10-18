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
          	<form action="{{ route('students.update' , $student->id) }}" method="post" enctype="multipart/form-data"> 
          		@csrf
          		@method('PUT')
          	<div class="row">

          		<div class="col-md-4">
          			<div class="form-group">
          			<label>Ref No:</label>
                    <input class="form-control" type="text" readonly="readonly" name="ref_no" value="{{$student->id}}">
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
          			<input class="form-control" type="date" name="date" value="{{$student->date}}">
          		</div>
          		</div>
          		<div class="col-md-8">
          			<div class="form-group">
          				<label>Picture:</label>
          				<input  type="file" name="picture" class="form-control-file">
          			</div>
          			

          		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Name:</label>
					<input type="text" value="{{$student->name}}" name="name" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
					<label>Gender:</label>
          
					<select name="gender" class="form-control">
						<option {{$student->gender == 'male' ? "selected" : ''}} value="male">Male</option>
						<option {{$student->gender == 'female' ? "selected" : ''}} value="female">Female</option>
					</select>
        		    </div>
        		</div>
        		
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Father Name:</label>
					<input  value="{{$student->father_name}}" type="text" name="father_name" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Date of Birth:</label>
					<input type="date"  value="{{$student->birth_date}}" name="birth_date" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>CNIC:</label>
					<input type="number"  value="{{$student->cnic}}" name="cnic" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Mobile No:</label>
					<input type="tel"  value="{{$student->contact}}" name="contact" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Father Mobile No:</label>
					<input type="tel"  value="{{$student->father_contact}}" name="father_contact" class="form-control">
          		</div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Email:</label>
					<input type="email" value="{{$student->email}}"  name="email" class="form-control">
          		    </div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Expertise:</label>
					<textarea  name="expertise" class="form-control">{{$student->expertise}}</textarea>
          		    </div>	
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
          			<label>Referral Person:</label>
					<input class="form-control" type="text" name="referral" value="{{$student->referral}}">
          		</div>	
        		</div>

        		<div class="col-md-12">
        			<div class="form-group">
          			<label>Address:</label>
					<textarea name="address" class="form-control">{{$student->address}}</textarea>
          		    </div>	
        		</div>
        		<div class="col-md-12">
        			<label>Selected Courses:</label>
        			<br>
              @foreach (explode(',' , $student->courses) as $course)
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" 
                   class="form-check-input" name="courses[]" checked disabled value="{{$course}}"> {{$course}}
                </label>
               </div>
              @endforeach
              <br><br>
              <label>Select Courses:</label>
              @foreach ($courses as $course)
                 <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" 
                   class="form-check-input" name="courses[]"  value="{{$course->name}}"> {{$course->name}}
                </label>
               </div>
              @endforeach
        		
					
					
					
					
					
				
					
					
        		</div>

        	</div>
				<br>
        	<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
          <a href="{{ route('students.index') }}" class="btn btn-warning"><i class="fa fa-close"></i> Close</a>
        	</form>
          </div>
          <br><br><br>
        
			
        </main>

        
@endsection
   
