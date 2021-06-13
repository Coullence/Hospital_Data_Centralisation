@extends('home')

@section('title')
	Hospitals
@endsection

@section('extra-css')

@endsection

@section('index')
<div class="content">
<!-- Vertical Layout -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card card-stats">
            <div class="">
                <h3>Manage Hospitals</h3>
                <a href="{{route('manage_hospitals.create')}}" class="btn btn-success btn-sm">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed table" id="dataTable">



                        <thead>
                            <tr>
                                <th>Hospital Name</th>
                                <th>Hospital Level</th>
                                <th>County</th>
                                <th>County</th>
                                <th>Telephone</th>
                                <th>Address</th>
                                <th>Registared on</th>
                                <th>Updated on</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hospitals as $row)
                            <tr>
                                <td>{{ $row->hospitalName }}</td>
                                <td>{{ $row->level }}</td>
                                <td>{{ $row->county }}</td>
                                <td>{{ $row->location }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->updated_at}}</td>
                                <td>
                                    <div style="display:flex;">
                                        <a href="{{route('manage_hospitals.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('manage_hospitals.destroy',$row->id) }}"  onclick="return confirm('Are you sure?')">
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
