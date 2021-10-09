@extends('department.master')
@section('title','Post List')
@section('body')
    <div class="container">
        <div class="row" >

            <table class="table table-bordered" id="resultData">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                  </tr>
                </thead> 
                <tbody>
                    @if(isset($departments) && $departments != null)
                        @foreach($departments as $department)
                        <tr>
                            <td>{{$department->id}}</td>
                            <td>{{$department->dept_name}}</td>
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