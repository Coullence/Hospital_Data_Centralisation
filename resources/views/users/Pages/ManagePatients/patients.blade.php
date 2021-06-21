@extends('home')

@section('title')
	Hospitals
@endsection

@section('extra-css')

@endsection

@section('index')
<style type="text/css">
    .btn{
        margin-left: 3px !important;
        margin-right: 3px !important;
    }
</style>
<div class="content">
<!-- Vertical Layout -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card card-stats">
            <div class="">
                <h3>Manage Patients</h3>
                <a href="{{route('manage_patients.create')}}" class="btn btn-success btn-sm">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed table" id="dataTable">



                        <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Patient ID</th>
                                <th>Patient Phone</th>
                                <th>Registared on</th>
                                <th>Updated On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $row)
                            <tr>
                                <td>{{ $row->patientName }}</td>
                                <td>{{ $row->patientId }}</td>
                                <td>{{ $row->patientPhone }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->updated_at}}</td>
                                <td>
                                    <div style="display:flex;">

                                        <a href="{{route('manage_patients.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>

                                        <a href="{{route('manage_patients.show',$row->id)}}" class="btn btn-default btn-sm">+ New Medication</a>

                                        <a href="{{route('patient_medical_history.show',$row->id)}}" class="btn btn-info btn-sm">View Medical History</a>

                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('manage_patients.destroy',$row->id) }}"  onclick="return confirm('Are you sure?')">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Vertical Layout -->

</div>
@endsection

@section('extra-script')

@endsection
