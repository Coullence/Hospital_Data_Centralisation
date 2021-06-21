@extends('home')

@section('title')
   User Profile
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
<div class="row">
<div class="col-md-2">
          </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="">
                <h3>
                    User Profile
                </h3>
            </div>
            <div class="body">
                <form id="form_validation" method="POST" action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                    <div class="form-group ">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" placeholder="Username" required autofocus>
                        @error('name')
                            <label id="name-error" class="error" for="name">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label">Mobile</label>
                        <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$user->mobile?$user->mobile:old('mobile')}}" placeholder="10 digit Mobile number" minlength=10 maxlength=10 pattern="\d*" title="10 digit Mobile number" required>
                        @error('mobile')
                            <label id="mobile-error" class="error" for="mobile">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="Email Id" required autofocus>
                        @error('email')
                            <label id="email-error" class="error" for="email">{{ $message }}</label>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
    
<div class="col-md-2">
          </div>
</div>
</div>
@endsection
