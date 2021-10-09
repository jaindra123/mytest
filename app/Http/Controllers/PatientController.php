<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;      /*  Add this Path */
use App\Models\Department;      /*  Add this Path */
use App\Models\Hospital;      /*  Add this Path */
use Illuminate\Support\Facades\DB;   /*  Add this Path */


class PatientController extends Controller
{
    #--------------------------- show form -------------------#
    public function addPatient(){
        return view('patient.add-patient');
    }
    #--------------------------- Insert -------------------#
    public function savePatient(Request $request) {
        $request->validate([
            'p_name' => 'required',
            'p_email' => 'required',
            'p_contact' => 'required',
            'hospital_id' => 'required',
            'dept_id' => 'required',
        ]);
        $patient = new Patient();
        $patient->p_name = $request->p_name;
        $patient->p_email = $request->p_email;
        $patient->p_contact = $request->p_contact;
        $patient->hospital_id    = $request->hospital_id ;
        $patient->dept_id = $request->dept_id;
        $patient->save();
        return back()->with('patient_save','Patient Added');
    }
    #--------------------------- Get All Patient -------------------#
    public function getPatient(){
        $patients = DB::table('patients')
            ->join('hospitals', 'patients.hospital_id', '=', 'hospitals.id')
            ->join('departments', 'patients.dept_id', '=', 'departments.id')
            ->select('patients.*', 'hospitals.hospital_name', 'departments.dept_name')
            ->get();
        return view('patient.patients',compact('patients'));
    }
    #--------------------------- Get All Departments -------------------#
    public function getAllDepartment(){
        $departmentsdd = Department::orderBy('id', 'ASC')->get(); 
       // echo "<pre>";
       // print_r($departmentsdd);
        return view('patient.add-patient',compact('departmentsdd'));
    }

    #--------------------------- Get All Hospital -------------------#
    public function getHospital(){
        $hospitals = Hospital::orderBy('id', 'ASC')->get(); 
        return view('patient.add-patient',compact('hospitals'));
    }

    #--------------------------- Search  -------------------#
    public function AutoCompleteSearch(Request $request){
        $email_key = $request->search_key;
        $contact_key =  $request->contact_key;
        $patients = DB::table('patients')
            ->join('hospitals', 'patients.hospital_id', '=', 'hospitals.id')
            ->join('departments', 'patients.dept_id', '=', 'departments.id')
            ->select('patients.*', 'hospitals.hospital_name', 'departments.dept_name')
            ->where('p_email', $email_key)
            ->orWhere('p_contact',$contact_key )
            ->get();
        return view('patient.patients',compact('patients'));
       
    }

}
