<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital; 
use App\Models\Department;   
use Illuminate\Support\Facades\DB;      

class HospitalController extends Controller
{
    #--------------------------- show form -------------------#
    public function addHospital(){
        return view('hospital.add-hospital');
    }
    #--------------------------- Insert -------------------#
    public function saveHospital(Request $request) {
        $request->validate([
            'hospital_name' => 'required',
            'dept_id' => 'required',
        ]);
        $hospital = new Hospital();
        $hospital->hospital_name = $request->hospital_name;
        $hospital->dept_id = $request->dept_id;
        $hospital->save();
        return back()->with('hospital_save','Hospital Added');
    }

    #--------------------------- Get All Departments -------------------#
    public function getAllDepartment(){
        $departments = Department::orderBy('id', 'ASC')->get(); 
        return view('hospital.add-hospital',compact('departments'));
    }

    #--------------------------- Get All Hospital -------------------#
    public function getHospital(){
        $hospitals = DB::table('hospitals')
            ->join('departments', 'hospitals.dept_id', '=', 'departments.id')
            ->select('hospitals.*', 'hospitals.hospital_name', 'departments.dept_name')
            ->get();
        return view('hospital.hospitals',compact('hospitals'));
    }


}
