@extends('layouts.app')

@section('content')

<section class="question-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                @include('layouts.error')

                @foreach($publicQuestions as $key => $value)
                <div class="card p-3">
                    <div class="question-wrapper">
                        <div class="profile-img">
                            <a href="#">
                            @php  $src    =  ($value->seekers->profile_pic) ? ($value->seekers->profile_pic) : 'userIcon.png';  @endphp
                                <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
                            </a>
                        </div>
                        <div class="name-wrap">
                            <h6>{{ $value->seekers->name }}</h6>
                        </div>
                        <div class="question">
                        @php $isAnswered   = false; @endphp
                        @foreach($value->answers as $kk => $vv)
                            @if($vv->answerMentor->id  == Auth::user()->id)
                               @php $isAnswered = true;  @endphp
                            @endif
                        @endforeach

                        <h5>Q. {{ $value->question }} </h5>
                        @if(Auth::user()->user_type == config('role.ROLES.MENTOR.TYPE') && !$isAnswered)
                              <button class="btn btn-primary float-right" data-toggle="modal" data-target="#answerModal{{$value->id}}"> <i class="fa fa-edit"></i> Write Answer</button>
                        @endif
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
                                <p> {!! $v->answer !!} </p>
                                <div class="action-box">
                                    <a href="javascript::void()" onclick="addLike({{ $v->id }})" ><span><i class="far fa-heart"></i></span> Like</a> <span>| {{ $v->likes }} </span>
                                </div>
                            </div>
                         </div>
                         <!-- /inner box -->
                            <hr>
                        @endforeach
                         
                         <!-- /inner box -->
                     </div>
                </div>

                <!-- The Modal -->
                <div class="modal fade modal-about-mentor"  id="answerModal{{ $value->id }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Write Your Answer</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ route('save.answer') }}"   method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="bold"> <strong> Q. {{ $value->question }} </strong> </label>
                            </div>
                            <div class="form-group">
                                <textarea name="answer" id="" cols="30" rows="10"></textarea>
                                <input type="hidden" value="{{ Auth::user()->id }}" name="mentor_id">
                                <input type="hidden" value="{{ $value->id }}" name="question_id">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-small float-right">Submit</button>
                            </div>
                            
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>


                @endforeach

                <!-- /card question -->
                <!-- <div class="card p-3">
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
                     </div>
                </div> -->
                <!-- /card question -->

            </div>
            <div class="col-lg-4 col-md-4">
               <div class="card sticky-dektop py-3 related-que">
                   <h5 class="px-3">Related Questions</h5>
                   <hr>
                   <a href=""#><strong>Gym trainer</strong>  <span>Someting someting someting someting someting</span> </a>
                   <a href=""#><strong>Doctor</strong> <span>officia voluptatum nostrum repudiandae odit iste illum laborum consequuntur molestiae doloribus</span> </a>
                   <a href=""#><strong>Yoga Teacher</strong> <span>officia voluptatum nostrum odit iste illum laborum consequuntur molestiae doloribus</span> </a>

               </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('custom_js')

<script>tinymce.init({ selector:'textarea' });
function addLike(answerId)
    {
      //  e.preventDefault();

      $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
       });

       $.ajax({
           method : "POST",
           url : '/add/like',
           data : { answerId : answerId  },
           success:function(data){
               console.log(data, 'test like');
               
           },
           error:function(){

           }
       })
    }

</script>


@endsection