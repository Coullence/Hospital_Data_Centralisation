<?php

namespace App\Http\Controllers\Users;


use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\User;
use App\Hospital;
use App\PatientRecords;
use App\PatientHistories;

class PatientHistoryController extends Controller
{
/**
    *
    * allow doctors only
    *
    */

    public function __construct() {
        $this->middleware('role:doctor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $patients = PatientHistories::all();
        return view('users.Pages.ManagePatientHistory.index',compact('patients'));


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.Pages.ManagePatientHistory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // get loged in user->hospital
        // get patient id form the url header
        // get patient name from id
        $request->validate([
            'patient-Id' => ['required', 'string', 'max:255'],
            'hospital' => ['required', 'string', 'max:255'],
            'Category' => ['required', 'string', 'max:255'],
            'disease' => ['required', 'string', 'max:500'],
        ]);

        $patient = PatientHistories::create(array_merge($request->all()));
        

        return redirect()->route('manage_patients.index')->with('success', "The  was saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $patient = PatientHistories::all()->where("patient-Id", "==", $id);
        return view('users.Pages.ManagePatientHistory.index',compact('patient'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $patient = PatientHistories::findOrFail($id);
        return view('users.Pages.ManagePatientHistory.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient-Id' => ['required', 'string', 'max:255'],
            'hospital' => ['required', 'string', 'max:255'],
            'Category' => ['required', 'string', 'max:255'],
            'disease' => ['required', 'string', 'max:500'],
        ]);

        $patient = PatientHistories::findOrFail($id);
        $patient->update(array_merge($request->all()));

        return redirect()->route('patient_medical_history.index')->with('warning', "The $patient->patientName was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = PatientHistories::findOrFail($id);
        $patient->delete();

        return redirect()->route('patient_medical_history.index')->with('danger', "The $patient->patientName was deleted successfully");
    }
}
