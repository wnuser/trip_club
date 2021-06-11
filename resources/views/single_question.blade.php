@extends('layouts.app')

@section('content')

<section class="question-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                @include('layouts.error')

                <div class="scrolling-pagination">

                    <div class="card p-3">
                        <div class="question-wrapper">
                            <div class="profile-img">
                                <a href="#">
                                @php  $src    =  ($questionDetails->seekers->profile_pic) ? ($questionDetails->seekers->profile_pic) : 'userIcon.png';  @endphp
                                    <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
                                </a>
                            </div>
                            <div class="name-wrap">
                                <h6>{{ $questionDetails->seekers->name }}</h6>
                            </div>
                            <div class="question">
                            @if(Auth::check())
                                @php $isAnswered   = false; @endphp
                                @foreach($questionDetails->answers as $kk => $vv)
                                    @if($vv->answerMentor->id  == Auth::user()->id)
                                    @php $isAnswered = true;  @endphp
                                    @endif
                                @endforeach
                            @endif
                            <h5>Q. {{ $questionDetails->question }} </h5>
                            @if(Auth::check())
                                @if(Auth::user()->user_type == config('role.ROLES.MENTOR.TYPE') && !$isAnswered)
                                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#answerModal{{$questionDetails->id}}"> <i class="fa fa-edit"></i> Write Answer</button>
                                @endif
                            @endif
                            </div>

                        </div>
                        <div class="answers-wrapper">
                            <span class="totol-ans">{{ $questionDetails->answers->count() }} Answers</span>
                            @php  $count = 1; @endphp 
                            @foreach($questionDetails->answers as $k => $v)
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
                                    @if(Auth::check())
                                        <div class="action-box">
                                            <a href="javascript::void()" onclick="addLike({{ $v->id }})" ><span><i class="far fa-heart"></i></span> Like</a> <span>| {{ $v->likes }} </span>
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

                    <!-- The Answer model  -->
                    <div class="modal fade modal-about-mentor"  id="answerModal{{ $questionDetails->id }}">
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
                                        <label for="" class="bold"> <strong> Q. {{ $questionDetails->question }} </strong> </label>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="answer" id="" cols="30" rows="10"></textarea>

                                        <input type="hidden" value="{{ Auth::user()->id }}" name="mentor_id">
                                        <input type="hidden" value="{{ $questionDetails->id }}" name="question_id">
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

                </div>

            </div>
            <div class="col-lg-4 col-md-4">
               <div class="card sticky-dektop py-3 related-que">
                   <h5 class="px-3">Related Questions</h5>
                   <hr>
                   @foreach($relatedQuestions as $key => $value)
                        <a href="{{ route('single.question', ['slug'=>$value->slug]) }}"> <span>Q. {{ $value->question }} </span> </a>
                   @endforeach
               </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('custom_js')

<script>
// $('ul.pagination').hide();

$(window).scroll(function() {
    var pageNo = 1;
  if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
    // $('#lipsum').append('<p style="background-color: red;">Sed tellus magna, pellentesque ut venenatis eu, molestie eget odio. Maecenas id finibus nisl. Aliquam et odio ante. Sed suscipit tortor mauris, a porttitor tortor accumsan eu. Etiam mauris magna, sodales sit amet cursus vel, hendrerit non arcu. Nunc non vestibulum arcu, eu fringilla orci. Integer egestas risus ultrices ipsum finibus pellentesque. Morbi lacinia felis dui. In eget lectus at elit commodo bibendum non sed ligula. Pellentesque dignissim, ante eget condimentum tincidunt, lacus urna consequat dui, a egestas lorem ligula ac odio. Duis arcu risus, bibendum sed condimentum et, efficitur vitae nulla. Nullam convallis quis sem id iaculis.</p>');
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


tinymce.init({ selector:'textarea' });
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