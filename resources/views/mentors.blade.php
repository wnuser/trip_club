@extends('layouts.app')
@section('content')
<section class="mentors pt-5">
  <div class="container">
  
<!-- mentors grid -->
   <div class="row">
      <div class="col-12">
         @include('layouts.error')
         <div class="card p-3">
           <div class="row">
            @foreach($mentors as $key => $value)
               <div class="col-lg-3 col-md-6 col-12">
                  <div class="card-mentors">
                     <div class="upper-box">
                       <div class="cover-bg">
                          <img src="{{ asset('Images/cover-mentors.jpg') }}" alt="cover-bg" class="img-fluid">
                       </div>
                       <div class="profile-box">
                       @php  $src    =  ($value->profile_pic) ? ($value->profile_pic) : 'userIcon.png';  @endphp
                        <a href="#about-mentor"  data-toggle="modal" class="profile-popup">
                        <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
                        </a>
                       </div>
                     </div>

                     <div class="body-content">
                        <h4>{{ $value->name }}</h4>
                        <p><span> {{ config('role.MENTORSTITLE.'.$value->mentor_type) }} </span> <span> from {{ $value->cityRelation->city_name }} </span> </p>
                        <a href="#about-mentor{{$value->id}}" data-toggle="modal" > <button class="btn btn-small extra ml-auto mr-auto">View Profile</button> </a>
                        @php  $years  = ($value->experience == 1) ? 'year' : 'years';  @endphp
                        <h6><span><i class="fas fa-atom"></i></span> {{ $value->experience }} {{ $years }} of experience</h6>
                        <a href="#askQuestionModel{{$value->id}}"  data-toggle="modal"  class="btn btn-small">Ask Question</a>
                     </div>
                  </div>
               </div>
            @endforeach   
               <!-- /column -->


           </div>
         </div>
      </div>
   </div>
  </div>

  <!-- about popup -->
<!-- Modal -->
@foreach($mentors as $k => $v)
<div class="modal fade modal-about-mentor" id="about-mentor{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="about-mentorlLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body p-0">
         <div class="about-card">
            <div class="cover-bg">
                  <img src="{{ asset('Images/cover-mentors.jpg') }}" alt="cover-bg" class="img-fluid">
            </div>
         <div class="profile-box">
            <a class="profile-popup" href="#">
                  @php  $src    =  ($value->profile_pic) ? ($value->profile_pic) : 'userIcon.png';  @endphp
                 <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
            </a>
         </div>
         <div class="about-body">
            <div class="button-strip">
                <!-- <a href="#" class="btn btn-small">Connect</a> -->
                <a href="#askQuestionModel{{$value->id}}"  data-toggle="modal" class="btn btn-small">Ask Question</a>
                <!-- <a href="#" class="btn btn-small">More</a> -->
            </div>
            <div class="about-info-box">
               <h4 class="mb-0">{{ $v->name }}</h4>
               <p><span> {{ config('role.MENTORSTITLE.'.$v->mentor_type) }} </span> </p>
               @php  $years  = ($v->experience == 1) ? 'year' : 'years';  @endphp
               <h6> {{ $v->cityRelation->city_name }} , {{ $v->stateRelation->state_name }}, {{ $v->countryRelation->country_name }} <span class="dot"></span> <span>{{ config('constants.experience.'.$v->experience) }} {{ $years }} of experience</span> <span class="dot"></span> <a href="#" class="">Contact Info</a></h6>
            </div>
         </div>
         </div>
         <hr>
      <div class="about-info-sec">
         <h5> <i class="fas fa-school"></i> Education</h5>
         <p> {{ $v->education }}</p>
      </div>

      <hr>

      <div class="about-info-sec">
         <h5> <i class="fas fa-info-circle"></i> About</h5>
         <p> {{ $v->about }} </p>
      </div>
      <hr>

      <div class="about-info-sec">
         <h5> <i class="fas fa-map-marked"></i> Office Address </h5>
         <p> {{ $v->office_address }} </p>
      </div>

      </div>
    </div>
  </div>
</div>



<div class="modal fade modal-about-mentor" id="askQuestionModel{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="about-mentorlLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ask Your Question </h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form action="{{ route('save.question') }}" method="POST">
      @csrf
      <div class="modal-body ask-q-modal">
         <p> You are asking from  {{ $v->name }} ({{ config('role.MENTORSTITLE.'.$v->mentor_type) }}) </p>
         <!-- <p>  </p> -->
         <div class="form-group mt-2">
            <textarea name="question" required id="" placeholder="Type your quetion here"></textarea>
         </div>
         @if(Auth::check())
            <input type="hidden" value="{{ Auth::user()->id }}" name="seeker_id">
         @endif
         <input type="hidden" name="mentor_id" value="{{ $v->id }}">
         <div class="text-right">
         <button type="submit" class="btn btn-small ml-auto">Submit</button>
         </div>
      </div>
      </form>
    </div>
  </div>
</div>



@endforeach







</section>

@endsection