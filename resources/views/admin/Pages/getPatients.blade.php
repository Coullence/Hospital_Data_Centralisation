@extends('home')

@section('title')
	User
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>User Details</h3>
                    <a href="{{route('users.create')}}" class="btn btn-success btn-sm">Add New User</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed" id="dataTable-patients">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Patient Phone</th>
                                    <th>Patient Id</th>
                                    <th>Created On</th>
                                    <th>Updated on</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                <tr>
                                    <td>{{ $patient->patientName }}</td>
                                    <td>{{ $patient->patientPhone }}</td>
                                    <td>{{ $patient->patientId }}</td>
                                    <td>{{ $patient->created_at }}</td>
                                    <td>{{ $patient->updated_at }}</td>
                                    <td>
                                        <div style="display:flex;">
                                        <a href="{{route('users.edit',$patient->id)}}" class="btn btn-sm btn-primary btn-sm">View History</a>
                                            &nbsp;
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
</div>
@endsection

@section('extra-script')

@endsection
