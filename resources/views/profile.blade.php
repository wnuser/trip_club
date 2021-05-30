@extends('layouts.app')

@section('content')

<section class="profile-sec">
   <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
               <div class="card card-hm">
                  <div class="about-card profile-about">
                     <div class="cover-bg">
                           <img src="{{ asset('Images/cover-mentors.jpg') }}" alt="cover-bg" class="img-fluid">
                     </div>
                     <div class="profile-box">
                        <a class="profile-popup" href="#">
                              @php  $src    =  ($userInfo->profile_pic) ? ($userInfo->profile_pic) : 'userIcon.png';  @endphp
                           <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
                        </a>
                     </div>
         <div class="about-body">
            <div class="button-strip">
                <!-- <a href="#" class="btn btn-small">Connect</a>
                <a href="#" class="btn btn-small">Message</a> -->
                <a href="#about-mentor" data-toggle="modal" class="btn btn-small btn-icon"><i class="fas fa-pen"></i></a>
            </div>
            <div class="about-info-box">
               <h4 class="mb-0">{{ $userInfo->name }}</h4>
               <p><span>{{ config('role.MENTORSTITLE.'.$userInfo->mentor_type) }}</span> </p>
               @php  $years  = ($userInfo->experience == 1) ? 'year' : 'years';   @endphp

               <h6> {{ ($userInfo->cityRelation)?  $userInfo->cityRelation->city_name.',' : false }}  {{ ($userInfo->stateRelation) ?  $userInfo->stateRelation->state_name.',' : false }}  {{ ($userInfo->countryRelation)  ? $userInfo->countryRelation->country_name.',' : false }} 
               
               @if($userInfo->experience)
                <span class="dot"></span> 
               <span>{{  config('constants.experience.'.$userInfo->experience) }} {{ $years }} of experience</span> <span class="dot"></span> 
               @endif
               <!-- <a href="#" class="">Contact Info</a></h6> -->
            </div>
         </div>

         
         </div>
               </div>
               <div class="card card-hm">
               <div class="about-info-sec">
                  <h5> <i class="fas fa-school"></i> Education</h5>
                  <p>{{ $userInfo->education }}</p>
                  </div>
               </div>

               <div class="card card-hm">
               <div class="about-info-sec">
                  <h5> <i class="fas fa-info-circle"></i> About</h5>
                  <p> {{ $userInfo->about }} </p>
                  </div>
               </div>

               <div class="card card-hm">
               <div class="about-info-sec">
                  <h5> <i class="fas fa-map-marked"></i> Office Address</h5>
                  <p> {{ $userInfo->office_address }} </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
              <div class="card">
                 <ul>
                     <li> 21 New Questions </li>
                     <li> 22 Answers Given  </li>
                     <li></li>
                 </ul>
                 <button class="btn btn-primary">Check Answers</button>
                  <br>
                 <button class="btn btn-primary">Ask Question</button>
              </div>
            </div>
        </div>
  </div>

  <!-- edit info modal -->
  <!-- Modal -->
   <div class="modal fade modal-about-mentor" id="about-mentor" tabindex="-1" role="dialog" aria-labelledby="about-mentorlLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      <div class="modal-body p-0">
         <div class="about-card profile-popup">
            <div class="cover-bg">
                  <img src="{{ asset('Images/cover-mentors.jpg') }}" alt="cover-bg" class="img-fluid">
            </div>
         <div class="profile-box">
            <a class="profile-popup" href="#">
                 <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
            </a>
             <label for="change-profile" class="btn-icon"><i class="fas fa-camera"></i></label>
             <input type="file" class="hidden" id="change-profile"/>
         </div>
         <form action="{{ route('update.profile') }}" method="POST">
         @csrf
         <input type="hidden" name="id" value="{{ Auth::user()->id }}">
         <div class="about-body">
            <div class="about-info-box">
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $userInfo['name'] }}" placeholder="Name"/>
                     </div>
                     <div class="col-lg-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" readonly value="{{ $userInfo['email'] }}" placeholder="Email"/>
                     </div>
                     <div class="col-lg-6">
                        <label for="name">Mobile</label>
                        <input type="number" class="form-control" name="mobile" value="{{ $userInfo['mobile'] }}" placeholder="Mobile"/>
                     </div>
                     <div class="col-lg-6">
                        <label for="name">Country</label>
                        {{ updateCountry($userInfo->country) }}

                     </div>
                     <div class="col-lg-6">
                        <label for="name">State</label>
                        {{ updateState($userInfo->state) }}

                     </div>
                     <div class="col-lg-6">
                        <label for="name">City</label>
                        {{  updateCity($userInfo->city) }}
                     </div>
                  @if(Auth::user()->user_type == config('role.ROLES.MENTOR.TYPE'))
                     <div class="col-lg-6">
                          <label for="domain">Your Domain</label>
                          {{  updateDomain($userInfo->mentor_type) }}
                     </div>
                     <div class="col-6">
                        <label for="name">How many years of experience you have?</label>
                        {{ experience($userInfo->experience) }}
                     </div>

                     <div class="col-12">
                        <label for="name">Education (Mention about your educational backgroud including all certifications.) </label>
                         <textarea name="education">{{ $userInfo->education }} </textarea>
                     </div>
                     <div class="col-12">
                        <label for="name">About (Mention about yourself, what kind of personality you are? your achievements, your expertise.) </label>
                         <textarea name="about"> {{ $userInfo->about }} </textarea>
                     </div>

                     <div class="col-12">
                        <label for="name">Office address (Your working place address from where you are operating.) </label>
                         <textarea name="office_address"> {{ $userInfo->office_address  }} </textarea>
                     </div>

                     <!-- <div class="col-12">
                           <button class="btn btn-primary"  >Save</button>
                     </div> -->
                  @endif  
                  </div>
              
            </div>
         </div>
        
         </div>
         <div class="modal-footer">
             <button type="submit" class="btn btn-small">Save</button>
         </div>
         </form>
    </div>
  </div>
   </div>
</section>

@endsection('content')


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