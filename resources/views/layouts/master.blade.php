<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Micrologicx Software House & Computer College</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
  
     
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> 

    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  </head>

  <body>




   <!-- navbar -->
    @include('layouts.inc.navbar')
    <div class="container-fluid">
      <div class="row">
       <!-- sidebar -->
            @include('layouts.inc.sidebar')
        <!-- main -->
          @yield('content')
      </div>
    </div>  



 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready( function () {
    $('#myTable').DataTable({
      bSort: false,
    });
      } );
    </script>
  </body>
</html>