<?php


namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\User;
use App\Hospital;




class HospitalController extends Controller
{
    /**
    *
    * allow admin only
    *
    */

    public function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hospitals = Hospital::all();
        return view('admin.Pages.ManageHospitals.index',compact('hospitals'));


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Pages.ManageHospitals.create');
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
            'hospitalName' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string',],
            'county' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'location' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $hospital = Hospital::create(array_merge($request->all()));
        

        return redirect()->route('manage_hospitals.index')->with('success', "The $hospital->hospitalName was saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $hospital = Hospital::findOrFail($id);
        return view('admin.Pages.ManageHospitals.edit', compact('hospital'));
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
            'hospitalName' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string',],
            'county' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'location' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $hospital = Hospital::findOrFail($id);
        $hospital->update(array_merge($request->all()));

        return redirect()->route('manage_hospitals.index')->with('warning', "The $hospital->hospitalName was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->delete();

        return redirect()->route('manage_hospitals.index')->with('danger', "The $hospital->hospitalName was deleted successfully");
    }
}
