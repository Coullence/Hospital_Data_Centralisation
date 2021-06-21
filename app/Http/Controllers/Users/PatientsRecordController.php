<?php

namespace App\Http\Controllers\Users;


use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\User;
use App\Hospital;
use App\PatientRecords;



class PatientsRecordController extends Controller
{/**
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

        $patients = PatientRecords::all();
        return view('users.Pages.ManagePatients.patients',compact('patients'));


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.Pages.ManagePatients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'patientName' => ['required', 'string', 'max:255'],
            'patientId' => ['required', 'string',],
            'patientPhone' => ['required', 'string', 'max:255']
        ]);

        $patient = PatientRecords::create(array_merge($request->all()));
        

        return redirect()->route('manage_patients.index')->with('success', "The $patient->patientName was saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $patient = PatientRecords::findOrFail($id);
        return view('users.Pages.ManagePatientHistory.edit', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $patient = PatientRecords::findOrFail($id);
        return view('users.Pages.ManagePatients.edit', compact('patient'));
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
            'patientName' => ['required', 'string', 'max:255'],
            'patientId' => ['required', 'string',],
            'patientPhone' => ['required', 'string', 'max:255']
        ]);

        $patient = PatientRecords::findOrFail($id);
        $patient->update(array_merge($request->all()));

        return redirect()->route('manage_patients.index')->with('warning', "The $patient->patientName was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = PatientRecords::findOrFail($id);
        $patient->delete();

        return redirect()->route('manage_patients.index')->with('danger', "The $patient->patientName was deleted successfully");
    }
}
