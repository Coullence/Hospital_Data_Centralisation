@extends('home')

@section('title')
	User
@endsection

@section('extra-css')

@endsection

@section('index')
        <div class="content">

            <div class="row">
                <div class="col-lg-2 col-md-2">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h3>
                                Add New Hospital
                            </h3>
                        </div>
                        <div class="card-body">
                           <form id="form_validation" method="POST" action="{{ route('manage_patients.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">


                                <div class="form-group ">
                                    <label class="form-label">Patient Name</label>
                                    <input type="text" class="form-control @error('patientName') is-invalid @enderror" name="patientName"  placeholder="Patient Name" required autofocus>
                                    @error('patientName')
                                        <label id="patientName" class="error" for="patientName">{{ $message }}</label>
                                    @enderror
                                </div>


                                <div class="form-group ">
                                    <label class="form-label">Patient Id</label>
                                    <input type="number" class="form-control @error('patientId') is-invalid @enderror" name="patientId"  placeholder="Patient ID" required autofocus>
                                    @error('patientId')
                                        <label id="patientId" class="error" for="patientId">{{ $message }}</label>
                                    @enderror
                                </div>
                              

                                    </div>
                                    <div class="col-md-6">


                                <div class="form-group ">
                                    <label class="form-label">Patient Phone</label>
                                    <input type="number" class="form-control @error('patientPhone') is-invalid @enderror" name="patientPhone" value="{{old('patientPhone')}}" placeholder="Patient Phone" required autofocus>
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
