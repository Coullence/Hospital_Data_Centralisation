@extends('home')

@section('title')
    Edit Permission
@endsection

@section('extra-css')
@endsection

@section('index')
<style type="text/css">
    .name{
        color: blue;
        font-weight: 400;
        text-decoration: underline;
    }
</style>
        <div class="content">
            <div class="row clearfix">
                <div class="col-md-3"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h3>
                                Edit <span class="name">{{$user->name}}</span> Details
                            </h3>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('users.update',$user->id) }}">
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
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="Email Id" required autofocus>
                                    @error('email')
                                        <label id="email-error" class="error" for="email">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">Mobile</label>
                                    <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$user->mobile}}" placeholder="10 digit Mobile number" minlength=10 maxlength=10 pattern="\d*" title="10 digit Mobile number" required>
                                    @error('mobile')
                                        <label id="mobile-error" class="error" for="mobile">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">Hospital</label>
                                    <select id="your-select" class="form-control @error('hospital') is-invalid @enderror" name="hospital"  required>
                                            @foreach($hospital as $row)
                                                <option>{{ $row->hospitalName }}</option>
                                            @endforeach
                                    </select>
                                     @error('roles')
                                        <label id="roles-error" class="error" for="roles">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">Roles</label>
                                    <select id="your-select" class="form-control @error('roles') is-invalid @enderror" name="roles[]" required>
                                            @foreach($roles as $role)
                                                <option>{{ $role }}</option>
                                            @endforeach
                                    </select>
                                     @error('roles')
                                        <label id="roles-error" class="error" for="roles">{{ $message }}</label>
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->

        </div>
@endsection

@section('extra-script')
<script type="text/javascript">
    var test = "{{$selectedRoles}}";
    if (test != '') {
        document.getElementById('your-select').value = test;
    }
</script>

@endsection
