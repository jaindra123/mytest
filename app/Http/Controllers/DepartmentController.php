<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;      

class DepartmentController extends Controller
{
    #--------------------------- show form -------------------#
    public function addDepartment(){
        return view('department.add-department');
    }
    #--------------------------- Insert -------------------#
    public function saveDepartment(Request $request) {
        $request->validate([
            'dept_name' => 'required',
        ]);
        $department = new Department();
        $department->dept_name = $request->dept_name;
        $department->save();
        return back()->with('department_save','Department Added');
    }
    #--------------------------- Get All Department -------------------#
    public function getDepartment(){
       // echo "fvds";
       // die();
        $departments = Department::orderBy('id', 'DESC')->get();    
        return view('department.departments',compact('departments'));
    }


}
