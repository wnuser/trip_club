@extends('layouts.app')

@section('content')

<section class="question-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                @foreach($publicQuestions as $key => $value)
                <div class="card p-3">
                    <div class="question-wrapper">
                        <div class="profile-img">
                            <a href="#">
                            @php  $src    =  ($value->seekers->profile_pic) ? ($value->seekers->profile_pic) : 'userIcon.png';  @endphp
                                <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
                            </a>
                        </div>
                        <div class="question">
                        <h5> {{ $value->question }} </h5>
                        </div>
                    </div>
                     <div class="answers-wrapper">
                        <span class="totol-ans">{{ $value->answers->count() }} Answers</span>

                        @php  $count = 1; @endphp 
                        @foreach($value->answers as $k => $v)
                         <div class="inner-box">
                            <div class="d-flex">
                                <div class="profile-img">
                                    <a href="#">
                                    @php  $src    =  ($v->answerMentor->profile_pic) ? ($v->answerMentor->profile_pic) : 'userIcon.png';  @endphp
                                        <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
                                    </a>
                                </div>
                                <div class="name-wrap">
                                    <h6>{{ $v->answerMentor->name }}</h6>
                                    <span>{{ config('role.MENTORSTITLE.'.$v->answerMentor->mentor_type) }} dehradun</span>
                                </div>
                            </div>
                            <div class="answers-box">
                                <p><strong>{{ $count++ }} .</strong> {!! $v->answer !!} </p>
                                <div class="action-box">
                                    <a href="#"><span><i class="far fa-heart"></i></span> Like</a> <span>| {{ $v->likes }} </span>
                                </div>
                            </div>
                         </div>
                         <!-- /inner box -->
                            <hr>
                        @endforeach
                         
                         <!-- /inner box -->
                     </div>
                </div>
                @endforeach

                <!-- /card question -->
                <div class="card p-3">
                    <div class="question-wrapper">
                        <div class="profile-img">
                            <a href="#">
                                <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
                            </a>
                        </div>
                        <div class="question">
                        <h5>what is the something something something something? </h5>
                        </div>
                    </div>
                     <div class="answers-wrapper">
                        <span class="totol-ans">22 Answers</span>
                         <div class="inner-box">
                            <div class="d-flex">
                                <div class="profile-img">
                                    <a href="#">
                                        <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
                                    </a>
                                </div>
                                <div class="name-wrap">
                                    <h6>John Doe</h6>
                                    <span>Gym trainer dehradun</span>
                                </div>
                            </div>
                            <div class="answers-box">
                                <p><strong>1.</strong>  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil esse distinctio dignissimos officia voluptatum nostrum doloremque repudiandae odit iste illum laborum consequuntur molestiae doloribus aliquam, aperiam, excepturi molestias laboriosam incidunt!</p>
                                <div class="action-box">
                                    <a href="#"><span><i class="far fa-heart"></i></span> Like</a> <span>| 14</span>
                                </div>
                            </div>
                         </div>
                         <!-- /inner box -->
                            <hr>
                         <div class="inner-box">
                            <div class="d-flex">
                                <div class="profile-img">
                                    <a href="#">
                                        <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
                                    </a>
                                </div>
                                <div class="name-wrap">
                                    <h6>John Doe Junior</h6>
                                    <span>Gym trainer dehradun</span>
                                </div>
                            </div>
                            <div class="answers-box">
                                <p><strong>2.</strong> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil esse distinctio dignissimos officia voluptatum nostrum doloremque repudiandae odit iste illum laborum consequuntur molestiae doloribus aliquam, aperiam, excepturi molestias laboriosam incidunt!</p>
                                <div class="action-box">
                                    <a href="#"><span><i class="far fa-heart"></i></span> Like</a> <span>| 34</span>
                                </div>
                            </div>
                         </div>
                         <!-- /inner box -->
                     </div>
                </div>
                <!-- /card question -->

            </div>
            <div class="col-lg-4 col-md-4">
               <div class="card sticky-dektop py-3 related-que">
                   <h5 class="px-3">Related Questions</h5>
                   <hr>
                   <a href=""#><strong>Q.</strong>  Someting someting someting someting someting </a>
                   <a href=""#><strong>Q.</strong> officia voluptatum nostrum repudiandae odit iste illum laborum consequuntur molestiae doloribus </a>
                   <a href=""#><strong>Q.</strong> officia voluptatum nostrum odit iste illum laborum consequuntur molestiae doloribus</a>

               </div>
            </div>
        </div>
    </div>
</section>

@endsection