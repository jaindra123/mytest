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
            'p_email' => 'required |email',
            //'p_contact' => 'required|min:10|numeric',
            'p_contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'hospital_id' => 'required',
            'dept_id' => 'required',
        ]);

        $patient = Patient::where('p_email', '=', $request->input('p_email'))->first();
        if ($patient != null) {
           echo "Patient already exit. Please sign up with another email account";
        } /*else {
          echo "Allow for sign up";
        }
        die();*/
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
    #--------------------------- Get All Hospital and Departments -------------------#
    public function getHospital(){
        $hospitals = Hospital::orderBy('id', 'ASC')->get(); 
        $departments = Department::orderBy('id', 'ASC')->get(); 
        return view('patient.add-patient',compact(['departments','hospitals']));
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
