@extends('layouts.app')

@section('custom_css')
<style>
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>

@endsection

@section('content')
<div class="container mt-5">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 300px;">
    <div class="card p-3">
      <div class="e-navlist e-navlist--active-bg">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link px-2 active" href="#"><i class="fa fa-edit"></i><span> Write Articles </span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="#"><i class="fa fa-question"></i><span> Asked Questions </span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="#"><i class="fas fa-history" aria-hidden="true"></i><span>Questions History</span></a></li>
        </ul>
      </div>
    </div>  
  </div>

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
                @include('layouts.error')
                <form id="uploadProfile" method="post" enctype="multipart/form-data" action="{{ route('uploadImage') }}">
                   @csrf
                  <div class="row">
                  <div class="col-12 col-sm-auto mb-3">
                    <div class="mx-auto" style="width: 140px;">
                      <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                        <!-- <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span> -->
                        @php  $src    =  ($userInfo->profile_pic) ? ($userInfo->profile_pic) : 'userIcon.png';  @endphp
                        <img src="{{ asset('Images/user_image/'.$src) }}"  class="img-fluid" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                      <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $userInfo->name }}</h4>
                      <p class="mb-0"> {{ $userInfo->email }} </p>
                      <div class="text-muted"><small>{{ $userInfo->mobile }}</small></div>
                      <div class="mt-2">
                          <label for="file-upload" class=" btn btn-primary">
                              <i class="fa fa-fw fa-camera"></i> Change Photo
                          </label>
                          <input id="file-upload" name="uploadProfile" title="Upload Profile Pic" type="file"/>
                          <input type="hidden" value="{{ $userInfo->id }}" name="user_id">
                          @if(!$userInfo->experience)
                              <div class="alert alert-danger">Please Complete your Bio</div>
                          @endif
                          @if(!$userInfo->profile_pic)
                              <div class="alert alert-danger">Please update your profile pic.</div>
                          @endif
                      </div>
                    </div>
                    <div class="text-center text-sm-right">
                      <span class="badge badge-success">{{ config('role.MENTORSTITLE.'.$userInfo->domain) }}</span>
                      <div class="text-muted"><small>Joined {{ $userInfo->created_at->format('d-m-Y') }} </small></div>
                    </div>
                  </div>
                </div>
                </form>
               
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="" method="POST" action="{{ route('update.profile') }}">
                  @csrf
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="name" placeholder="Full Name" value="{{ $userInfo->name }}">
                              <input type="hidden" name="id" value="{{ $userInfo->id }}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Mobile</label>
                              <input class="form-control" type="number" name="mobile" placeholder="Mobile" value="{{ $userInfo->mobile }}">
                            </div>
                          </div>
                        </div>
                       
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>Add Bio (Please mention your education, experience, expertise, office location ) </label>
                              <textarea class="form-control" name="experience" rows="6" placeholder="My Bio">{{ $userInfo->experience }}</textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b></b></div>
                        <!-- <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" placeholder="••••••"></div>
                          </div>
                        </div> -->
                        <div class="row">
                            <div class="col">
                                 <div class="form-group">
                                      <label for="">Your Domain</label>
                                      {{  updateDomain($userInfo->domain) }}
                                 </div>
                            </div>
                        </div>
                        <div class="row">  
                               <div class="col">
                                    <div class="form-group">
                                         <label for="">State</label>
                                         {{ updateState($userInfo->state) }}
                                    </div>
                               </div>
                            </div>   
                      </div>
                      <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                      <div class="mb-2"><b></b></div>

                           <div class="row">
                               <div class="col">
                                    <div class="form-group">
                                        <label for="">Country</label>
                                        {{ updateCountry($userInfo->country) }}
                                    </div>
                               </div>
                            </div>
                             

                            <div class="row">
                               <div class="col">
                                   <div class="form-group">
                                       <label for="">City</label>
                                       {{  updateCity($userInfo->city) }}
                                   </div>
                               </div> 
                           </div>

                           <!-- <div class="row">
                                <div class="col">
                                <label>Show Mobile No. to users?</label>
                                    <div class="custom-controls-stacked px-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                        <label class="custom-control-label" for="notifications-blog">Yes</label>
                                    </div>
                                    </div>
                                </div>
                           </div> -->
                      </div>    
                     
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn-custom-reverse" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <a class="btn btn-block btn-secondary" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Support</h6>
            <p class="card-text">Get fast, free help from our friendly assistants.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div>
      </div> -->
    </div>

  </div>
</div>
</div>

@endsection


@section('custom_js')

<script>

$('#file-upload').on('change', function(){
  $('#uploadProfile').submit();
});


$('#state').on('change', function(){
   var stateId   = $('#state').val();
//    alert(stateId);

   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

   $.ajax({
       method: "POST",
       url: "/get/city",
       data : {stateId:stateId},
       success:function(data){
          $('#city').empty();
          $('#city').append(data);
       },
       error:function(){

       }
   })
});




$('#country').on('change', function(){
   var countryId   = $('#country').val();

   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

   $.ajax({
       method: "POST",
       url: '/get/state',
       data : {countryId: countryId},
       success:function(data){
            console.log(data);
            $('#state').empty();
            $('#state').append(data);
            
       },
       error:function(){

       }

   })
});

</script>
@endsection