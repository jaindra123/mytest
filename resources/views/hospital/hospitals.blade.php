@extends('hospital.master')
@section('title','Post List')
@section('body')
    <div class="container">
        <div class="row" >

            <table class="table table-bordered" id="resultData">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Hospital Name</th>
                    <th>Department Name</th>
                  </tr>
                </thead> 
                <tbody>
                    @if(isset($hospitals) && $hospitals != null)
                        @foreach($hospitals as $hospital)
                        <tr>
                            <td>{{$hospital->id}}</td>
                            <td>{{$hospital->hospital_name}}</td>
                            <td>{{$hospital->dept_name}}</td>
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

@endsection