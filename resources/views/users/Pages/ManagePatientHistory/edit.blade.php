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
    .patientDetails{
        background-color: greenyellow;

    }
    .patientDisease{
        background-color: deepskyblue;

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
                               Recording medical History for <span class="hospitalName"> {{$patient->patientName}} </span>
                            </h3>
                        </div>
                        <div class="card-body">

                           <form id="form_validation" method="POST" action="{{ route('patient_medical_history.store') }}">
                                @csrf


                            <input type="hidden"  type="text" name="patient-Id" value="{{$patient->id}}" >



                                <div class="row">
                                    <div class="col-md-6 patientDetails">


                                <div class="form-group ">
                                    <label class="form-label">Patient Name</label>
                                    <input type="text" class="form-control @error('patientName') is-invalid @enderror" name="patientName" value="{{$patient->patientName}}"  disabled="true" placeholder="Patient Name" required autofocus>
                                    @error('patientName')
                                        <label id="patientName" class="error" for="patientName">{{ $message }}</label>
                                    @enderror
                                </div>


                                <div class="form-group ">
                                    <label class="form-label">Patient Id</label>
                                    <input type="number" class="form-control @error('patientId') is-invalid @enderror" name="patientId" value="{{$patient->patientId}}" disabled="true" placeholder="Patient ID" required autofocus>
                                    @error('patientId')
                                        <label id="patientId" class="error" for="patientId">{{ $message }}</label>
                                    @enderror
                                </div>

                                
                                <div class="form-group ">
                                    <label class="form-label">Patient Phone</label>
                                    <input type="number" class="form-control @error('patientPhone') is-invalid @enderror" name="patientPhone" value="{{$patient->patientPhone}}" disabled="true"  placeholder="Patient Phone" required autofocus>
                                    @error('patientPhone')
                                        <label id="patientPhone" class="error" for="patientPhone">{{ $message }}</label>
                                    @enderror
                                </div>

                                    </div>
                                    <div class="col-md-6 patientDisease">

                                  <div class="form-group ">
                                    <label class="form-label">Hospital</label>
                                    <input type="text" class="form-control @error('hospital') is-invalid @enderror" name="hospital"   placeholder="Hospital Name" required autofocus>
                                    @error('hospital')
                                        <label id="hospital" class="error" for="hospital">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label class="form-label">Disease Category</label>
                                    <input type="text" class="form-control @error('Category') is-invalid @enderror" name="Category"   placeholder="Disease Category" required autofocus>
                                    @error('Category')
                                        <label id="Category" class="error" for="Category">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label class="form-label">Disease Description</label>
                                   

                                    <textarea type="text-area" class="form-control @error('disease') is-invalid @enderror" name="disease"   placeholder="Disease Description" required >
                                        
                                    </textarea>
                                    @error('disease')
                                        <label id="disease" class="error" for="disease">{{ $message }}</label>
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
