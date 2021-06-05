@extends('layouts.app')

@section('content')

<section class="question-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2"></div>
            <div class="col-lg-8 col-md-8">

            @foreach($answeredQuestions as $key => $value)
                <div class="card p-3">
                    <div class="question-wrapper">
                        <div class="profile-img">
                            <a href="#">
                                <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
                            </a>
                        </div>
                        <div class="question">
                        <h5>Q. {{ $value->question }} </h5>
                        </div>
                    </div>
                     <div class="answers-wrapper">
                        <span class="totol-ans">Your Answer</span>
                         <div class="inner-box">
                            <div class="d-flex">
                                <div class="profile-img">
                                    <a href="#">
                                        <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
                                    </a>
                                </div>
                                <div class="name-wrap">
                                    <h6> {{ $value->mentor->name }} </h6>
                                    <span> {{ config('role.MENTORSTITLE.'.$value->mentor->mentor_type) }} </span>
                                </div>
                            </div>
                            <div class="answers-box">
                                @foreach($value->answers as $k => $v)
                                    <p>{!! $v->answer !!} </p>
                                @endforeach
                                <div class="action-box">
                                    <a href="#"><span><i class="far fa-heart"></i></span> Like</a> <span>| {{ $value->likes }} </span>
                                </div>
                            </div>
                         </div>
                         <!-- /inner box -->
                         <!-- /inner box -->
                     </div>
                </div>
            @endforeach
                <!-- /card question -->
                <!-- /card question -->

            </div>
            <div class="col-lg-2 col-md-2"></div>
            <!-- <div class="col-lg-4 col-md-4">
               <div class="card sticky-dektop py-3 related-que">
                   <h5 class="px-3">Related Questions</h5>
                   <hr>
                   <a href=""#><strong>Q.</strong>  Someting someting someting someting someting </a>
                   <a href=""#><strong>Q.</strong> officia voluptatum nostrum repudiandae odit iste illum laborum consequuntur molestiae doloribus </a>
                   <a href=""#><strong>Q.</strong> officia voluptatum nostrum odit iste illum laborum consequuntur molestiae doloribus</a>

               </div>
            </div> -->
        </div>
    </div>
</section>

@endsection