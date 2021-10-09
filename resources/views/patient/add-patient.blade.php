@extends('patient.master')

@section('title','Add New Redord')

@section('body')

    <div class="container">
      @if(Session::has('patient_save'))
        <div class="alert alert-success alert-dismissible fade show">
            {{Session::get('patient_save')}}
        </div>
      @endif
      <form action="{{route('patient.save')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Patient Name</label>
            <input type="text" name="p_name" class="form-control" id="" placeholder="Name" >
            @error('p_name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Patient Email</label>
            <input type="email" name="p_email" class="form-control" id="" placeholder="Email">
            @error('p_email')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Patient Contact</label>
             <input type="text" name="p_contact" class="form-control" id="" placeholder="Name" >
            @error('p_contact')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group col-md-6">
            <label for="inputPassword4">Hospital Name</label>
             <select name="hospital_id" id="hospital_id">
              <option value="">-Select Hospital-</option>
                 @if(isset($hospitals) && $hospitals != null)
                      @foreach($hospitals as $hospital)
                       <option value="{{$hospital->id}}">{{$hospital->hospital_name }}</option>
                      @endforeach
                  @endif
              </select>
          </div>

          <div class="form-group col-md-6">
            <label for="inputPassword4">Department Name</label>
              <select name="dept_id" id="dept_id">
                <option value="">-Select Department-</option>
                  @if(isset($departmentsdd) && $departmentsdd != null)
                      @foreach($departmentsdd as $department)
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