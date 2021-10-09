@extends('department.master')

@section('title','Add New Department')

@section('body')

    <div class="container">
      @if(Session::has('department_save'))
        <div class="alert alert-success alert-dismissible fade show">
            {{Session::get('department_save')}}
        </div>
      @endif
      <form action="{{route('department.save')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Department Name</label>
            <input type="text" name="dept_name" class="form-control" id="" placeholder="Enter Department Name" >
            @error('dept_name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </diV>

@endsection