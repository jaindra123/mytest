@extends('patient.master')
@section('title','Post List')
@section('body')
    <div class="container">
        <div class="row" >
           <form action="{{route('patient.search')}}" method="GET" style="margin-top: 20px;">
               <input type="text" name="search_key" class="form-control" id="" placeholder="Email" >
                <input type="text" name="contact_key" class="form-control" id="" placeholder="Contact" >
                <input type="submit" class="btn btn-danger btn-sm" value="Filter">
            </form>
           
            <table class="table table-bordered" id="resultData">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Hospital Name</th>
                    <th>Department Name</th>
                  </tr>
                </thead> 
                <tbody>
                    @if(isset($patients) && $patients != null)
                        @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->id}}</td>
                            <td>{{$patient->p_name}}</td>
                            <td>{{$patient->p_email}}</td>
                            <td>{{$patient->p_contact}}</td>
                            <td>{{$patient->hospital_name}}</td>
                            <td>{{$patient->dept_name}}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
         </div>
    </div>
    <style type="text/css">
        #indeximg{
            height:80px;
            width:80px;
        }
    </style>


   <!--  <script src="http://demo.expertphp.in/js/jquery.js"></script>
    <script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>
    <link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">

    <script type="text/javascript">
        var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
        jQuery(document).ready(function(){
            jQuery( "#blog_search" ).autocomplete({
                source: function( request, response ) {
                  jQuery.ajax({
                    url:"{{route('patient.search')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                       _token: CSRF_TOKEN,
                       search: request.term
                    },
                    success: function( data ) {
                       response( data );
                    }
                  });
                },
                select: function (event, ui) {
                   jQuery('#blog_search').val(ui.item.label); 
                   jQuery('#blogid').val(ui.item.value); 
                   return false;
                }
            });
        });
    </script>  -->
  

@endsection