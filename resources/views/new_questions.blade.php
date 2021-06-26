@extends('layouts.app')

@section('content')

<section class="question-sec">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-2 col-md-2"></div> -->
            <div class="col-lg-8 col-md-8">
            @include('layouts.error')
            @if($newQuestions->isEmpty())
               <div class="alert alert-danger">No New Questions found!</div>
            @endif

            @foreach($newQuestions as $key => $value)
                <div class="card p-3">
                    <div class="question-wrapper">
                        <div class="profile-img">
                            <a href="#">
                                @php  $src    =  ($value->seekers->profile_pic) ? ($value->seekers->profile_pic) : 'userIcon.png';  @endphp
                                <img src="{{ asset('Images/user_image/'.$src) }}" style="border " alt="profile" class="img-fluid">
                            </a>
                        </div>
                        <div class="name-wrap">
                            <h6>{{ $value->seekers->name }}</h6>
                        </div>
                        <div class="question">
                        <h5>Q. {{ $value->question }}</h5> 
                        </div>
                    </div>
                     <div class="answers-wrapper">

                        <span class="totol-ans">Write Your Answers</span>
                         
                         <!-- /inner box -->
                         <form action="{{ route('save.answer') }}" method="POST" >
                            @csrf
                               <input type="hidden" name="question_id" value="{{ $value->id }}" id="">
                               <div class="form-group">
                                <textarea name="answer" id="" cols="65" rows="10"></textarea>
                               </div>
                               <div class="form-group">
                               <button type="submit" class="btn btn-primary float-right">Submit</button>
                               </div>
                         </form>
                         <!-- /inner box -->
                     </div>
                </div>
            @endforeach    
             

            </div>
            <!-- <div class="col-lg-2 col-md-2"></div> -->
            <!-- <div class="col-lg-4 col-md-4">
               <div class="card sticky-dektop py-3 related-que">
                   <h5 class="px-3">Related Questions</h5>
                   <hr>
                   <a href=""#><strong>Q.</strong>  Someting someting someting someting someting </a>
                   <a href=""#><strong>Q.</strong> officia voluptatum nostrum repudiandae odit iste illum laborum consequuntur molestiae doloribus </a>
                   <a href=""#><strong>Q.</strong> officia voluptatum nostrum odit iste illum laborum consequuntur molestiae doloribus</a>

               </div>
            </div> -->
            @if(Auth::user()->user_type == config('role.ROLES.MENTOR.TYPE'))
            <div class="col-lg-4 col-md-12 col-12">
              <div class="card py-3 qna-sidebar sticky-desktop">
                <a href="{{ route('profile') }}">
                  <strong><i class="fas fa-user"></i> Profile</strong>
                  <small>Update your profile</small>
                  <!-- <span class="tag completed">Completed</span> -->
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
            </div>
         @endif  
        </div>
    </div>
</section>

@endsection

@section('custom_js')

<script>tinymce.init({ selector:'textarea' });</script>

@endsection