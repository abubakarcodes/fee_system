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



          	<form action="{{ route('courses.update' , $course->id) }}" method="post"> 
              @method('PUT')
          		@csrf
          	<h3>Course</h3>
          	<br>
            <div class="col-md-6">
              <div class="form-group">
                <label>Name:</label>
          <input type="text" value="{{$course->name}}" name="name" class="form-control">
              </div> 
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button> 
              <a href="{{ route('courses.index') }}" class="btn btn-warning"><i class="fa fa-close"></i>Close</a>
            </div>
        	
        	</form>
          </div>
          <br><br><br>
       
	
        </main>

        
@endsection
   
