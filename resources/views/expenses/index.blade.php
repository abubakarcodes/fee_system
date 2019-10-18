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
          	<form action="{{ route('college-expenses.store') }}" method="post"> 
          		@csrf
            
          	<h3>Cashbook</h3>
          	<br>
            <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Date:</label>
               <input type="date" value="{{date('Y-m-d')}}" name="date" class="form-control">
              </div> 
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Amount:</label>
               <input type="text" value="{{old('amount')}}" name="amount" class="form-control">
              </div> 
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Narration:</label>
               <input type="text" value="{{old('narration')}}" name="narration" class="form-control">
              </div> 
            </div>
            <div class="col-md-3">
              <label>Entry type:</label>
              <br>
              <div class="form-group">
               <label>Debit:</label>
                <input type="radio" checked="checked" value="debit" name="entry_type">
               <label>Credit:</label>
               <input type="radio" value="credit" name="entry_type" >
              </div> 
            </div>
          </div>
        	 <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button> 
        	</form>
          </div>
          <br><br><br>
          <hr>
			<h1>CashBook Listing</h1>
      <br>
      <div class="row">
        <div class="col-md-6">
          <h3>Debit</h3>
          <br>
          <div class="table-responsive">
            <table  class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Narration</th>
                </tr>
              </thead>
              <tbody>
                @foreach($debits as $debit)
              <tr>
                <td>{{$debit->date}}</td>
                <td>{{$debit->amount}}</td>
                <td>{{$debit->narration}}</td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr class="text-center">
                  <th colspan="2">
                    Total Debit
                  </th>
                  <th>
                    {{$total_debit}}
                  </th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Credit</h3>
          <br>
          <div class="table-responsive">
            <table   class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Narration</th>
                </tr>
              </thead>
              <tbody>
              @foreach($credits as $credit)
              <tr>
                <td>{{$credit->date}}</td>
                <td>{{abs($credit->amount)}}</td>
                <td>{{$credit->narration}}</td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr class="text-center">
                  <th colspan="2">
                    Total Credit
                  </th>
                  <th>
                    {{abs($total_credit)}}
                  </th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <th>
                  Total Cash
                </th>
                <th>
                  {{$total_cash}}
                </th>
              </thead>
            </table>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>
           <br><br>
        </main>

        
@endsection
   
