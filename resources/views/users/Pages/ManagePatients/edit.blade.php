@extends('home')

@section('title')
	User
@endsection

@section('extra-css')

@endsection

@section('index')
<style type="text/css">
    .hospitalName{
        color: blue;
        font-weight: 600;
        text-decoration: underline;
    }
</style>

        <div class="content">

            <div class="row">
                <div class="col-lg-2 col-md-2">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h3>
                               Update <span class="hospitalName"> {{$patient->patientName}} </span>
                            </h3>
                        </div>
                        <div class="card-body">
                           <form id="form_validation" method="POST" action="{{ route('manage_patients.update', $patient->id) }}">
                                @csrf

                            <input name="_method" type="hidden" value="PUT">
                                <div class="row">
                                    <div class="col-md-6">


                                <div class="form-group ">
                                    <label class="form-label">Patient Name</label>
                                    <input type="text" class="form-control @error('patientName') is-invalid @enderror" name="patientName" value="{{$patient->patientName}}"  placeholder="Patient Name" required autofocus>
                                    @error('patientName')
                                        <label id="patientName" class="error" for="patientName">{{ $message }}</label>
                                    @enderror
                                </div>


                                <div class="form-group ">
                                    <label class="form-label">Patient Id</label>
                                    <input type="number" class="form-control @error('patientId') is-invalid @enderror" name="patientId" value="{{$patient->patientId}}" placeholder="Patient ID" required autofocus>
                                    @error('patientId')
                                        <label id="patientId" class="error" for="patientId">{{ $message }}</label>
                                    @enderror
                                </div>
                              

                                    </div>
                                    <div class="col-md-6">


                                <div class="form-group ">
                                    <label class="form-label">Patient Phone</label>
                                    <input type="number" class="form-control @error('patientPhone') is-invalid @enderror" name="patientPhone" value="{{$patient->patientPhone}}" placeholder="Patient Phone" required autofocus>
                                    @error('patientPhone')
                                        <label id="patientPhone" class="error" for="patientPhone">{{ $message }}</label>
                                    @enderror
                                </div>



                             

                                    </div>
                                </div>
                             
                               

                           

                                <button class="btn btn-primary btn-sm" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->

        </div>
@endsection

@section('extra-script')
@endsection
