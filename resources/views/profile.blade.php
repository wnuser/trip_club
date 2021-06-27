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

         @if(Auth::user()->user_type == config('role.ROLES.MENTOR.TYPE'))
            <div class="card card-hm">
               <div class="about-info-sec">
                  <h5> <i class="fas fa-map-marked"></i> Office Address</h5>
                  <p> {{ $userInfo->office_address }} </p>
                  </div>
               </div>
           
         @endif   

         </div>
         @if(Auth::user()->user_type == config('role.ROLES.MENTOR.TYPE'))
            <div class="col-lg-4 col-md-12 col-12">
              <div class="card py-3 qna-sidebar sticky-desktop">
               <a href="{{ route('mentor.new.questions') }}">
                  <strong>{{ $newQuestions }} New Questions</strong>
                  <small>Pending to answers</small>
                  <span class="tag new">New</span>
               </a>
               <a href="{{ route('mentor.answered.questions') }}">
                  <strong>{{ $completedQuestions }} Answers Given</strong>
                  <small>Completed to answers</small>
                  <span class="tag completed">Completed</span>
               </a>
               <a href="{{ route('feed') }}">
                  <strong><i class="fas fa-newspaper text-primary"></i> News Feed</strong>
                  <small>Promote yourself by posting your services</small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               <a href="{{ route('forum') }}">
                  <strong> <i class="fas fa-question"></i> View Questions </strong>
                  <small>View all publically asked questions</small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               <a href="{{ route('mentors', ['id'=>2]) }}">
                  <strong> <i class="fas fa-walking bold"></i> Yoga Teachers </strong>
                  <small>All Yoga Teachers who registered with us</small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               <a href="{{ route('mentors', ['id'=>4]) }}">
                  <strong> <i class="fas fa-hand-holding-heart"></i> Relationship Coaches </strong>
                  <small>All Relationship coaches </small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               <a href="{{ route('mentors', ['id'=>3]) }}">
                  <strong> <i class="fas fa-briefcase-medical"></i> Doctors </strong>
                  <small>All Doctors who registed with us</small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               <a href="{{ route('mentors', ['id'=>1]) }}">
                  <strong> <i class="fas fa-dumbbell"></i> Gym Trainers </strong>
                  <small>All Gym Trainers who registered with us</small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               
               
              </div>

              <div class="card sticky-dektop py-3 related-que">
                   <h5 class="px-3">Read Blogs About Health </h5>
                   <hr>
                     @foreach($blogs as $key => $value)
                        <a href="{{ route('single.blog', ['slug'=>$value->slug]) }}"> <span> {{ $value->title }} </span> </a>
                     @endforeach   
               </div>
            
            </div>
         @endif   

         @if(Auth::user()->user_type == config('role.ROLES.MENTEE.TYPE'))
            <div class="col-lg-4 col-md-12 col-12">
              <div class="card py-3 qna-sidebar sticky-desktop">
               <a href="{{ route('your.questions') }}">
                  <strong>{{ $userInfo->seekerQuestions->count() }} Your Questions</strong>
                  <small>Check answers</small>
                  <!-- <span class="tag new">New</span> -->
               </a>
               <a href="{{ route('feed') }}">
                  <strong><i class="fas fa-newspaper text-primary"></i> News Feed</strong>
                  <small>Posts by Health Mentors their services </small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               <a href="{{ route('forum') }}">
                  <strong> <i class="fas fa-question"></i> View Questions </strong>
                  <small>View all publically asked questions</small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               <a href="{{ route('mentors', ['id'=>2]) }}">
                  <strong> <i class="fas fa-walking bold"></i> Yoga Teachers </strong>
                  <small>All Yoga Teachers who registered with us</small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               <a href="{{ route('mentors', ['id'=>4]) }}">
                  <strong> <i class="fas fa-hand-holding-heart"></i> Relationship Coaches </strong>
                  <small>All Relationship coaches </small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               <a href="{{ route('mentors', ['id'=>3]) }}">
                  <strong> <i class="fas fa-briefcase-medical"></i> Doctors </strong>
                  <small>All Doctors who registed with us</small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
               <a href="{{ route('mentors', ['id'=>1]) }}">
                  <strong> <i class="fas fa-dumbbell"></i> Gym Trainers </strong>
                  <small>All Gym Trainers who registered with us</small>
                  <!-- <span class="tag completed">Completed</span> -->
               </a>
              </div>
              <div class="card sticky-dektop py-3 related-que">
                   <h5 class="px-3">Read Blogs About Health </h5>
                   <hr>
                     @foreach($blogs as $key => $value)
                        <a href="{{ route('single.blog', ['slug'=>$value->slug]) }}"> <span> {{ $value->title }} </span> </a>
                     @endforeach   
               </div>
            </div>
         @endif
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
         <form  id="uploadProfile" action="{{ route('uploadImage') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="about-card profile-popup">
               <div class="cover-bg">
                     <img src="{{ asset('Images/cover-mentors.jpg') }}" alt="cover-bg" class="img-fluid">
               </div>
            <div class="profile-box">
               <a class="profile-popup" href="#">
               @php  $src    =  ($userInfo->profile_pic) ? ($userInfo->profile_pic) : 'userIcon.png';  @endphp
                  <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
               </a>
               <label for="change-profile" class="btn-icon"><i class="fas fa-camera"></i></label>
               <input type="file" class="hidden" name="uploadProfile" id="change-profile"/>
               <input type="hidden" value="{{ $userInfo->id }}" name="user_id">

            </div>
         </form>
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
                  @endif   

                     <div class="col-12">
                        <label for="name">Education {{ (Auth::user()->user_type == config('role.ROLES.MENTOR.TYPE')) ? '(Mention about your educational backgroud including all certifications.)' : ''  }}   </label>
                         <textarea name="education">{{ $userInfo->education }} </textarea>
                     </div>
                     <div class="col-12">
                        <label for="name">About {{ ((Auth::user()->user_type == config('role.ROLES.MENTOR.TYPE'))) ? '(Mention about yourself, what kind of personality you are? your achievements, your expertise.)' : '' }}  </label>
                         <textarea name="about"> {{ $userInfo->about }} </textarea>
                     </div>
                  @if(Auth::user()->user_type == config('role.ROLES.MENTOR.TYPE'))
                     <div class="col-12">
                        <label for="name">Office address (Your working place address from where you are operating.) </label>
                         <textarea name="office_address"> {{ $userInfo->office_address  }} </textarea>
                     </div>
                  @endif  
                  </div>
              
            </div>
         </div>
        
         </div>
         <div class="modal-footer">
             <button type="submit" class="btn btn-small mt-0">Save</button>
         </div>
         </form>
    </div>
  </div>
   </div>
</section>

@endsection('content')


@section('custom_js')

<script>

$('#change-profile').on('change', function(){
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