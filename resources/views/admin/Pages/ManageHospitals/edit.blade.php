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
                               Update <span class="hospitalName"> {{$hospital->hospitalName}} </span> Hospital
                            </h3>
                        </div>
                        <div class="card-body">
                           <form id="form_validation" method="POST" action="{{ route('manage_hospitals.update', $hospital->id) }}">
                                @csrf

                            <input name="_method" type="hidden" value="PUT">
                                <div class="row">
                                    <div class="col-md-6">

                                <div class="form-group ">
                                    <label class="form-label">Hospital Name</label>
                                    <input type="text" class="form-control @error('hospitalName') is-invalid @enderror" name="hospitalName" value="{{$hospital->hospitalName}}" placeholder="Hospital Name" required autofocus>
                                    @error('hospitalName')
                                        <label id="hospitalName" class="error" for="hospitalName">{{ $message }}</label>
                                    @enderror 
                                </div>


                                <div class="form-group ">
                                    <label class="form-label">Hospital Level</label>
                                    <select id="your-select" class="form-control @error('level') is-invalid @enderror" name="level" value="{{$hospital->level}}"  required>
                                           
                                                <option>Level 1</option>
                                                <option>Level 2 </option>
                                                <option>Level 3</option>
                                                <option>Level 5</option>
                                                <option>Level 6</option>

                                        
                                    </select>
                                     @error('level')
                                        <label id="level-error" class="error" for="level">{{ $message }}</label>
                                    @enderror
                                </div>

                                

                                <div class="form-group ">
                                    <label class="form-label">County</label>
                                    <input type="text" class="form-control @error('county') is-invalid @enderror" name="county" value="{{$hospital->county}}"  placeholder="County" required autofocus>
                                    @error('county')
                                        <label id="county-error" class="error" for="county">{{ $message }}</label>
                                    @enderror
                                </div>

                                    </div>
                                    <div class="col-md-6">



                                <div class="form-group ">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{$hospital->location}}"  placeholder="Location" required autofocus>
                                    @error('location')
                                        <label id="location-error" class="error" for="location">{{ $message }}</label>
                                    @enderror
                                </div>


                                    <div class="form-group ">
                                    <label class="form-label">Telephone</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"  placeholder="10 digit Tel number" minlength=10 maxlength=10 pattern="\d*" title="10 digit Telephone number" value="{{$hospital->phone}}"  required>
                                    @error('phone')
                                        <label id="phone-error" class="error" for="phone">{{ $message }}</label>
                                    @enderror
                                    </div>


                                <div class="form-group ">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"  placeholder="Address" value="{{$hospital->address}}"  required autofocus>
                                    @error('address')
                                        <label id="address-error" class="error" for="address">{{ $message }}</label>
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
