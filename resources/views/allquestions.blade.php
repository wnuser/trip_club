@extends('layouts.app')

@section('content')

<section class="question-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                @include('layouts.error')

                <div class="scrolling-pagination">
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
                        @if(Auth::check())
                            @php $isAnswered   = false; @endphp
                            @php $isLiked      = false; @endphp
                            @foreach($value->answers as $kk => $vv)
                                @if($vv->answerMentor->id  == Auth::user()->id)
                                    @php $isAnswered = true;  @endphp
                                @endif

                                @foreach($vv->answerLikes as $likeKey => $likeValue)
                                    @if($likeValue->user_id == Auth::user()->id)
                                        @php  $isLiked = true; @endphp
                                    @endif
                                @endforeach

                            @endforeach
                        @endif
                        
                        <h5>Q. {!! $value->question !!} </h5>
                        @if(Auth::check())
                            @if(Auth::user()->user_type == config('role.ROLES.MENTOR.TYPE') && !$isAnswered)
                                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#answerModal{{$value->id}}"> 
                                <i class="fa fa-edit"></i> Write Answer</button>
                            @endif
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
                                <a href="javascript::void" onClick="getUserDetails({{ $v->answerMentor->id }})"> <h6>{{ $v->answerMentor->name }}</h6> </a>
                                    <span>{{ config('role.MENTORSTITLE.'.$v->answerMentor->mentor_type) }} 
                                     @if($v->answerMentor->cityRelation)
                                        from {{ $v->answerMentor->cityRelation->city_name }}
                                     @endif

                                    </span>
                                </div>
                            </div>
                            <div class="answers-box">
                                <p> {!! $v->answer !!} </p>
                                @if(Auth::check())
                                    <!-- <div class="action-box ">
                                        <a href="javascript::void()" class=" {{ ($isLiked) ? 'bg-success' : '' }} " onclick="addLike({{ $v->id }})" ><span><i class="far fa-heart"></i></span> Like</a> <span id="likeBox{{$v->id}}">| {{ $v->likes }} </span>
                                     -->
                                    <div class="action-box" >
                                        <a href="javascript::void()" onclick="addLike({{ $v->id }})" id="likeBox{{$v->id}}" class="{{ ($isLiked) ? 'liked' : '' }} " ><span><i class="far fa-heart"></i></span> Like</a> <span id="likeCountBox{{$v->id}}">| {{ $v->likes }} </span>
                                    </div>
                                @endif
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
                    @if(Auth::check())
                        <form action="{{ route('save.answer') }}"   method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="bold"> <strong> Q. {{ $value->question }} </strong> </label>
                            </div>
                            <div class="form-group">
                                <textarea name="answer" class="textarea" cols="30" rows="10"></textarea>

                                <input type="hidden" value="{{ Auth::user()->id }}" name="mentor_id">
                                <input type="hidden" value="{{ $value->id }}" name="question_id">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-small float-right">Submit</button>
                            </div>
                        </form>
                    @endif    
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>

                @endforeach
                </div>

                {{ $publicQuestions->links()     }}

            </div>
            <div class="col-lg-4 col-md-4">
               
               <div class="card py-3 qna-sidebar sticky-desktop s-icons-sidebar">
               <h5 class="px-3">Filter By Topic</h5>
                <hr>
                <a href="{{ route('forum', ['id'=> 2]) }}">
                    <strong>   Health Care</strong>
                    <small>General health care</small>
                    <span class="tag new bg-white " >
                    <!-- <i class="fas fa-user-md"></i>        -->
                    <img src="{{ asset('Images/icons/healthcare.png') }}" class="img-fluid" height="20" width="20" alt="">
                    </span>
                </a>
                <a href="{{ route('forum', ['id'=> 1]) }}">
                    <strong> Fitness</strong>
                    <small>Maintain fitness at gym </small>
                    <span class="tag new bg-white">
                    <!-- <i class="fas fa-walking"></i> -->
                    <img src="{{ asset('Images/icons/fitness.png') }}" class="img-fluid" height="20" width="20" alt="">

                    </span>
                </a>
                <a href="{{ route('forum', ['id'=> 3]) }}">
                    <strong>Yoga</strong>
                    <small>Maintain yourself on mental level </small>
                    <span class="tag new bg-white">
                    <!-- <i class="fas fa-walking"></i> -->
                    <img src="{{ asset('Images/icons/yoga.png') }}" class="img-fluid" height="20" width="20" alt="">

                    </span>
                </a>
                <a href="{{ route('forum', ['id'=> 4]) }}">
                    <strong>Relationships</strong>
                    <small>Relationships are the best for human</small>
                    <span class="tag new bg-white">
                    <!-- <i class="fas fa-heart"></i> -->
                    <img src="{{ asset('Images/icons/relationship.png') }}" class="img-fluid" height="20" width="20" alt="">

                    </span>
                </a>
              </div>
              @if($randamQuestions->isNotEmpty())
              <div class="card sticky-dektop py-3 related-que">
                   <h5 class="px-3">Most Viewed Questions</h5>
                   <hr>
                   @foreach($randamQuestions as $key => $value)
                        <a href="{{ route('single.question', ['slug'=>$value->slug]) }}"> <span> {{ $value->question }} </span> </a>
                   @endforeach
               </div>
               @endif
            </div>
            <!-- profile model  --->

            <div class="modal fade modal-about-mentor" id="about-mentor" tabindex="-1" role="dialog" aria-labelledby="about-mentorlLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body p-0" id="user-info">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('custom_js')

<script>
// $('ul.pagination').hide();

function getUserDetails(userId)
{
    // alert(userId);
    $('#about-mentor').modal('show');
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $('#user-info').empty();

    $.ajax({
        method: "POST",
        url: "/user/details",
        data: {userId:userId},
        success:function(data){
            console.log(data,'test');
            $('#user-info').empty();
            $('#user-info').append(data);
        },
        error:function(){

        }
    })


}

$(window).scroll(function() {
    var pageNo = 1;
    if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
    // $('#lipsum').append('<p style="background-color: red;">Sed tellus magna, pellentesque ut venenatis eu, 
    //molestie eget odio. Maecenas id finibus nisl. Aliquam et odio ante. Sed suscipit tortor mauris, a porttitor tortor accumsan eu. Etiam mauris magna, sodales 
    //sit amet cursus vel, hendrerit non arcu. Nunc non vestibulum arcu, eu fringilla orci. Integer egestas risus ultrices ipsum finibus pellentesque. Morbi lacinia felis dui. In eget lectus at elit commodo bibendum non sed ligula. 
    //Pellentesque dignissim, ante eget condimentum tincidunt, lacus urna consequat dui, a egestas lorem ligula ac odio. Duis arcu risus, bibendum sed condimentum et, efficitur vitae nulla. Nullam convallis quis sem id iaculis.</p>');
     console.log('tetss', pageNo+1);
     
  }
});

    // $(document).ready(function())
    $(function() {
        $('.scrolling-pagination').jscroll({
            // console.log('yesy');
            
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
            // console.log('test');
        });
    });


tinymce.init({ selector:'.textarea' });


function addLike(answerId)
    {

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
                $('#likeCountBox'+answerId).text('| '+data[0]);
               if(data[1] == 1) {
                $('#likeBox'+answerId).addClass('liked');
               } else {
                $('#likeBox'+answerId).removeClass('liked');
               }
           },
           error:function(){

           }
       })
    }

</script>


@endsection