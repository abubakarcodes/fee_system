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
          	<form action="{{ route('courses.store') }}" method="post"> 
          		@csrf
          	<h3>Courses</h3>
          	<br>
            <div class="col-md-6">
              <div class="form-group">
                <label>Name:</label>
          <input type="text" value="{{old('name')}}" name="name" class="form-control">
              </div> 
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button> 
            </div>
        	
        	</form>
          </div>
          <br><br><br>
          <hr>
			<h1>Course Listings</h1>
      <br>
      <div class="row">
        <div class="table-responsive">
            <table  id="myTable" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Course</th>
                  <th>Course Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($courses as $course)
                  <tr>
                  <td>{{$course->id}}</td>
                  <td>{{$course->name}}</td>
                  <td>
                    <a class="btn btn-outline-primary btn-sm" style="display: inline;" href="{{ route('courses.edit' , $course->id) }}"><i class="fa fa-edit"></i></a>
                    <form method="post" style="display: inline;" action="{{ route('courses.destroy' , $course->id) }}">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-outline-danger btn-sm" ><i class="fa fa-trash"></i></button>
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
   
