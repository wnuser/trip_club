@extends('layouts.app')

@section('content')

<section class="question-sec">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-2 col-md-2"></div> -->
            <div class="col-lg-8 col-md-8">

            @foreach($askedQuestions as $key => $value)
                <div class="card p-3">
                    <div class="question-wrapper">
                        <div class="profile-img">
                            <a href="#">
                            @php  $src    =  ($value->seekers->profile_pic) ? ($value->seekers->profile_pic) : 'userIcon.png';  @endphp
                                <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
                            </a>
                        </div>
                        <div class="question">
                        <h5>Q. {{ $value->question }} </h5>
                        </div>
                    </div>

                    <div class="answers-wrapper">
                        <span class="totol-ans">{{ $value->answers->count() }}  Answers</span>

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
                                    <h6> {{ $v->answerMentor->name }} </h6>
                                    <span> {{ config('role.MENTORSTITLE.'.$v->answerMentor->mentor_type) }} </span>
                                </div>
                            </div>
                            <div class="answers-box">
                                    <p>{!! $v->answer !!} </p>
                                <div class="action-box">
                                    <a href="#"><span><i class="far fa-heart"></i></span> Like</a> <span>| {{ $v->likes }} </span>
                                </div>
                            </div>
                         </div>
                         <hr>
                         @endforeach

                         <!-- /inner box -->
                         <!-- /inner box -->
                     </div>

                </div>
            @endforeach
                <!-- /card question -->
                <!-- /card question -->

            </div>
            <!-- <div class="col-lg-2 col-md-2"></div> -->
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card py-3 qna-sidebar sticky-desktop">
                <a href="{{ route('profile') }}">
                    <strong> Profile </strong>
                    <small>Update your profile </small>
                    <!-- <span class="tag new">New</span> -->
                </a>
                <a href="{{ route('feed') }}">
                    <strong> Feed </strong>
                    <small>visit mentors posts</small>
                    <!-- <span class="tag completed">Completed</span> -->
                </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection