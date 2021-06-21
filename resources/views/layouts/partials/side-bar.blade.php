<div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
          <img src="{{url('storage/profile-pic')}}/{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}"/>
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
          {{ Auth::user()->name }}<br>
          {{Auth::user()->email}}
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li {{Route::is('home')? 'class=active':''}}>
            <a href="{{route('home')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>

          @role('admin')

        

       <li {{Route::is('permissions.index')||Route::is('permissions.create')||Route::is('permissions.edit')? 'class=active':''}}>
              <a href="{{route('manage_hospitals.index')}}">
              <i class="nc-icon nc-bank"></i>
                  <p>Manage Hospitals</p>
              </a>
        </li>

  

       <li {{Route::is('permissions.index')||Route::is('permissions.create')||Route::is('permissions.edit')? '':''}}>
              <a href="{{route('getPatientsRecords.index')}}">
              <i class="nc-icon nc-bank"></i>
                  <p>View Medical History</p>
              </a>
        </li>



       <li {{Route::is('permissions.index')||Route::is('permissions.create')||Route::is('permissions.edit')? '':''}}>
              <a href="{{route('users.index')}}">
              <i class="nc-icon nc-single-02"></i>
                  <p>Manage Doctors</p>
              </a>
        </li>

      @endrole

      @role('doctor')

        

       <li {{Route::is('permissions.index')||Route::is('permissions.create')||Route::is('permissions.edit')? 'class=active':''}}>
              <a href="{{route('manage_patients.index')}}">
              <i class="nc-icon nc-bank"></i>
                  <p>Manage Patients</p>
              </a>
        </li>

  

       <li {{Route::is('permissions.index')||Route::is('permissions.create')||Route::is('permissions.edit')? '':''}}>
              <a href="{{route('getPatientsRecords.index')}}">
              <i class="nc-icon nc-bank"></i>
                  <p>View Medical History</p>
              </a>
        </li>

      @endrole

      <li {{Route::is('profile.index')? 'class=active':''}}>
        <a href="{{ route('profile.index') }}">
          <i class="nc-icon nc-circle-10"></i>
          <p>User Profile</p>
        </a>
      </li>

        </ul>
      </div>
</div>
