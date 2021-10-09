@extends('hospital.master')

@section('title','Add New hospital')

@section('body')

    <div class="container">
      @if(Session::has('hospital_save'))
        <div class="alert alert-success alert-dismissible fade show">
            {{Session::get('hospital_save')}}
        </div>
      @endif
      <form action="{{route('hospital.save')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Hospital Name</label>
            <input type="text" name="hospital_name" class="form-control" id="" placeholder="Enter hospital Name" >
            @error('hospital_name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

           <div class="form-group col-md-6">
            <label for="inputPassword4"> Department Name</label>
              <select name="dept_id" id="">
                <option value="">-Select Department-</option>
                  @if(isset($departments) && $departments != null)
                      @foreach($departments as $department)
                       <option value="{{$department->id}}">{{$department->dept_name}}</option>
                      @endforeach
                  @endif
              </select>
          </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </diV>

@endsection