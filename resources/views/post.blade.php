@extends('layouts.app')

@section('content')

<section class="post-sec">
   <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 ">
                 <div class="card side-card pb-3 sticky-dektop card-anchors 	d-none d-sm-block ">
                     
                     <div class="profile-box-side">
                         <div class="cover-bg">
                            <img src="{{ asset('Images/cover-mentors.jpg') }}" alt="profile" class="img-fluid">
                         </div>
                         <div class="img-profile">
                             <a href="#">
                             @php  $userImg  = (Auth::check()) ? Auth::user()->profile_pic : 'userIcon.png';   @endphp
                             <img src="{{ asset('Images/user_image/'.$userImg) }}" alt="profile" class="img-fluid">
                             </a>
                         </div>
                         <div class="info-box-side pt-5">
                         <h5> 
                           @if(Auth::check())
                                {{ Auth::user()->name }}      
                           @else 
                                Health Mentors
                           @endif
                         </h5>
                         @if(Auth::check())
                           <p> {{ config('role.MENTORSTITLE.'.Auth::user()->mentor_type) }} </p>
                         @endif
                         </div>
                     </div>
                    <!-- <div class="list">
                        <h6 class="text-center" style="font-weight:bold">Read Blogs</h6>
                        <ul class="listing-highlighted" style="list-style: none;">
                           <li><span> <i class="fas fa-briefcase-medical text-danger"></i> </span>  <a href="{{ route('category.blogs', ['id'=>3]) }}">Health Care   </a> 
                           </li>
                           <li><span> <i class="fas fa-user-secret text-primary"></i> </span>  <a href="{{ route('category.blogs', ['id'=>4]) }}">Fashion & Lifestyle   </a> 
                           </li>
                           <li><span> <i class="fas fa-walking bold text-success"></i> </span>  <a href="{{ route('category.blogs', ['id'=>5]) }}"> Fitness   </a> 
                           </li>
                        </ul>
                    </div> -->
                     
                     
                </div>

            </div>
            <div class="col-lg-6 col-md-12 col-12">
            @include('layouts.error')

               <div class="card post-card p-3">
                   <div class="d-flex">
                     <div class="profile-img">
                     @php  $src    =   (Auth::check()) ? ( (Auth::user()->profile_pic) ? (Auth::user()->profile_pic) : 'userIcon.png') : 'userIcon.png' ;  @endphp
                     <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
                    </div>
                  @if(Auth::check())  
                    <a href="#create-post" data-toggle="modal">
                      Write a post
                    </a>
                  @else 
                     <a href="#ask-login" data-toggle="modal">
                      Write a post
                    </a>
                  @endif  
                   </div>
               </div>
           

            @foreach($posts as $key => $value)
                <div class="card feed-card p-3">
                   <div class="d-flex hover-box-wrap">
                       <div class="profile-img">
                          <a href="#">
                          @php  $src    =  ($value->user->profile_pic) ? ($value->user->profile_pic) : 'userIcon.png';  @endphp
                          <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
                          </a>
                        </div>
                        <div class="name-post">
                           <h6> {{ $value->user->name }} </h6>
                           <span>{{ config('role.MENTORSTITLE.'.$value->user->mentor_type) }} 
                           {{ ($value->user->cityRelation) ? 'from '.$value->user->cityRelation->city_name : '' }}
                            </span>
                        </div>
                        <div class="hover-info">
                           <div class="name-info">
                              <div class="profile-img">
                              <a href="#">
                              @php  $mentorImg   = ($value->user->profile_pic) ?  ($value->user->profile_pic) : 'userIcon.png';  @endphp
                              <img src="{{ asset('Images/user_image/'.$mentorImg) }}" alt="profile" class="img-fluid">
                              </a>
                              </div>
                              <div class="name-post">
                                 <h6> {{ $value->user->name }} </h6>
                                 <span>
                                 {{ config('role.MENTORSTITLE.'.$value->user->mentor_type) }} 
                                 {{ ($value->user->cityRelation) ? 'from '.$value->user->cityRelation->city_name : '' }}
                                 </span>
                              </div>
                           </div>
                           <div class="chat-btn d-flex">
                              @php  $userId   = $value->user->id; 
                                    $userName = $value->user->name ;
                                    $array    = [$userId, $userName];
                                    $json     = json_encode($array);  @endphp
                               <a href="javascript:void(0)" onClick="askQuestions({{$json}})"  class="btn btn-small mr-2">Ask question</a>
                               <a href="javascript:void(0)" onClick="getUserDetails({{ $value->user->id }})" class="btn btn-small">View Profile</a>
                           </div>
                        </div>
                   </div>
                   <div class="post-content">
                      <p> {!! $value->title !!} </p>
                      @if($value->image) 
                      <div class="img-block">
                          <img src="{{ asset('Images/uploads/'.$value->image) }}" alt="cover-bg" class="img-fluid">
                      </div>
                      @endif
                   </div>
                   <div class="action-count">
                      <span class="count"><span><i class="far fa-heart"></i></span> <span id="like-count{{$value->id}}"> {{ $value->postLikes->count() }} </span> </span>
                      <span class="count"><span><i class="far fa-comments"></i></span> <span  id="comment-count{{$value->id}}"> {{ $value->postComments->count() }}  </span> </span>
                   </div>
                  @if(Auth::check())
                     @php $isLiked  = false; @endphp
                     @foreach($value->postLikes as $k => $v)
                          @if(Auth::user()->id == $v->user_id)
                              @php  $isLiked  = true; @endphp
                          @endif
                     @endforeach
                     <div class="action-box">
                        <a href="javascript:void(0)" class="{{ ($isLiked) ? 'liked' : '' }} " id="like-button{{$value->id}}"  onClick="addLike({{ $value->id }})" ><span><i class="far fa-heart"></i></span> Like</a>
                        <a href="#comments-sec{{$value->id}}" data-toggle="collapse" class="cmt-btn"><span><i class="far fa-comments"></i></span> Comment</a>
                     </div>

                     <div class="comment-sec collapse" id="comments-sec{{$value->id}}">

                     @if(Auth::check())
                        <div class="d-flex">
                           <div class="profile-img">
                                 <a href="">
                                 @php  $userImg   =  ($value->user->profile_pic) ? ($value->user->profile_pic) : 'userIcon.png'; @endphp
                                    <img src="{{ asset('Images/user_image/'.$userImg) }}" alt="profile" class="img-fluid">
                                 </a>
                           </div>
                           <div class="name-post d-flex">
                                 <!-- <h6> Jitendra kumar </h6> -->
                                 <form action="" id="comment-form{{$value->id}}" method="POST">
                                    <textarea class="form-control" id="comment{{$value->id}}"  name="comment" placeholder="Add a comment.."> </textarea>
                                    <input type="hidden" name="post_id" value="{{ $value->id }}" id="post-id{{$value->id}}" >
                                    <button class="btn btn-small" onClick="submitForm({{$value->id}})" >Post</button>
                                 </form>
                              </div>
                        </div>
                     @endif

                     <div id="pre-comments{{$value->id}}">
                        @foreach($value->postComments as $commentKey => $commentValue)
                           <div class="d-flex">
                              <div class="profile-img">
                                 <a href="#">
                                       @php  $userImg   =  ($commentValue->user->profile_pic) ? ($commentValue->user->profile_pic) : 'userIcon.png'; @endphp
                                       <img src="{{ asset('Images/user_image/'.$userImg) }}" alt="profile" class="img-fluid">
                                 </a>
                              </div>
                              <div class="name-post">
                                 <h6> {{ $commentValue->user->name }} </h6>
                                 <span> {{ $commentValue->comment }}
                                 </span>
                              </div>
                           </div>
                           
                        @endforeach   
                     </div>
                     </div>
                  @else 

                    <div class="action-box">
                        <a href="javascript:void(0)" class="" data-toggle="modal" data-target="#ask-login" ><span><i class="far fa-heart"></i></span> Like</a>
                        <a href="#comments-sec{{$value->id}}" data-toggle="collapse" class="cmt-btn"><span><i class="far fa-comments"></i></span> Comment</a>
                     </div>

                     <div class="comment-sec collapse" id="comments-sec{{$value->id}}">

                     @if(Auth::check())
                        <div class="d-flex">
                           <div class="profile-img">
                                 <a href="">
                                 @php  $userImg   =  ($value->user->profile_pic) ? ($value->user->profile_pic) : 'userIcon.png'; @endphp
                                    <img src="{{ asset('Images/user_image/'.$userImg) }}" alt="profile" class="img-fluid">
                                 </a>
                           </div>
                           <div class="name-post d-flex">
                                 <!-- <h6> Jitendra kumar </h6> -->
                                 <form action="" id="comment-form{{$value->id}}" method="POST">
                                    <textarea class="form-control" id="comment{{$value->id}}"  name="comment" placeholder="Add a comment.."> </textarea>
                                    <input type="hidden" name="post_id" value="{{ $value->id }}" id="post-id{{$value->id}}" >
                                    <button class="btn btn-small" onClick="submitForm({{$value->id}})" >Post</button>
                                 </form>
                              </div>
                        </div>
                     @endif

                     <div id="pre-comments{{$value->id}}">
                        @foreach($value->postComments as $commentKey => $commentValue)
                           <div class="d-flex">
                              <div class="profile-img">
                                 <a href="#">
                                       @php  $userImg   =  ($commentValue->user->profile_pic) ? ($commentValue->user->profile_pic) : 'userIcon.png'; @endphp
                                       <img src="{{ asset('Images/user_image/'.$userImg) }}" alt="profile" class="img-fluid">
                                 </a>
                              </div>
                              <div class="name-post">
                                 <h6> {{ $commentValue->user->name }} </h6>
                                 <span> {{ $commentValue->comment }}
                                 </span>
                              </div>
                           </div>
                           
                        @endforeach   
                     </div>
                     </div>
                  @endif   
                </div>
            @endforeach    
            </div>
            <div class="col-lg-3 col-md-12 col-12">
                 <div class="card py-3 sticky-dektop card-anchors">
                    <div class="filter-sd px-3">
                       <h5>Explore More</h5>
                       <!-- <select name="filter" id="">
                          <option value="">Filter By Mentors</option>
                          {{ mentorsOption() }}
                       </select> -->
                    </div>
                    <hr>
                  <!-- <a href="#">
                   <div class="d-flex sidebar-list">
                      <div class="profile-img">
                        <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
                      </div>
                      <div class="name-post">
                        <h6>John Doe</h6>
                        <span>Gym trainer dehradun this is a </span>
                      </div>
                   </div>
                   </a> -->
                   
                  <!-- <h5 class="px-3">Latest feed</h5> -->
                  <div class="ac-side-box">
                        <div id="accordion">
                           <div class="card">
                              <div class="card-header p-0" id="headingTwo">
                                 <h5 class="mb-0">
                                 <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Health Mentors  <span><i class="fas fa-angle-down"></i> </span>
                                 </button>
                                 </h5>
                              </div>
                              <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                 <div class="card-body">
                                 <ul class="listing-highlighted">
                                    <li><span>  <img src="{{ asset('Images/icons/yoga.png') }}" class="img-fluid" height="15" width="15" alt=""></span>  <a href="{{ route('mentors', ['id'=>2]) }}"> Yoga Teachers  </a> 
                                    </li>
                                    <li><span> <img src="{{ asset('Images/icons/fitness.png') }}" class="img-fluid" height="15" width="15" alt=""></span>  <a href="{{ route('mentors', ['id'=>1]) }}">Gym Trainers   </a> 
                                    </li>
                                    <li><span> <img src="{{ asset('Images/icons/healthcare.png') }}" class="img-fluid" height="15" width="15" alt=""></span>  <a href="{{ route('mentors', ['id'=>3]) }}"> Doctos   </a> 
                                    </li>
                                    <li><span> <img src="{{ asset('Images/icons/relationship.png') }}" class="img-fluid" height="15" width="15" alt=""></span>  <a href="{{ route('mentors', ['id'=>4]) }}">Relationship Coach   </a> 
                                    </li>

                                 </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="card">
                              <div class="card-header p-0" id="headingOne">
                                 <h5 class="mb-0">
                                 <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Forum <span><i class="fas fa-angle-down"></i> </span>
                                 </button>
                                 </h5>
                              </div>

                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                 <div class="card-body">
                                 <ul class="listing-highlighted">
                                    <li><span> <i class="fas fa-edit text-success"></i> </span>  <a href="{{ route('forum') }}">View Answers   </a> 
                                    </li>
                                 </ul>
                                 </div>
                              </div>
                           </div>

                           

                           <div class="card">
                              <div class="card-header p-0" id="headingThree">
                                 <h5 class="mb-0">
                                 <button class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 Read Blogs <span><i class="fas fa-angle-down"></i> </span>
                                 </button>
                                 </h5>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                 <div class="card-body">
                                    <ul class="listing-highlighted">
                                       <li><span> <i class="fas fa-briefcase-medical text-danger"></i> </span>  <a href="{{ route('category.blogs', ['id'=>3]) }}">Health Care   </a> 
                                       </li>
                                       <li><span> <i class="fas fa-user-secret text-primary"></i> </span>  <a href="{{ route('category.blogs', ['id'=>4]) }}">Fashion & Lifestyle   </a> 
                                       </li>
                                       <li><span> <i class="fas fa-walking bold text-success"></i> </span>  <a href="{{ route('category.blogs', ['id'=>5]) }}">Fitness   </a> 
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           </div>
                        </div>
                 </div>
            </div>
        </div>
  </div>

  <!-- === create post modal === -->
    <!-- Modal -->
<div class="modal fade modal-create-post" id="create-post" tabindex="-1" role="dialog" aria-labelledby="about-mentorlLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{ route('save.post') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="modal-header py-3">
          <h5 class="mb-0">Create Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
         <div class="modal-body feed-card">
            <div class="d-flex">
                  <div class="profile-img">
                     @if(Auth::check())
                        <a href="#">
                        @php  $src    =  (Auth::user()->profile_pic) ? (Auth::user()->profile_pic) : 'userIcon.png';  @endphp
                           <img src="{{ asset('Images/user_image/'.$src) }}" alt="profile" class="img-fluid">
                        </a>
                     @endif
                  </div>
                     <div class="name-post">
                     @if(Auth::check())
                        <h6> {{ Auth::user()->name }} </h6>
                        <span> {{ config('role.MENTORSTITLE.'.Auth::user()->mentor_type) }}  </span>
                     @endif
                     </div>
            </div>
               <textarea name="title" id="title"  placeholder="Write something here.." autofocus="autofocus"></textarea>  
               @if(Auth::check())
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
               @endif
               <div id="post-image">
               
               </div> 
         </div>
         <div class="modal-footer text-right pt-1 pb-2">
              <div class="photo-upload">
                  <label for="upload-img"><i class="fas fa-image"></i> <span>Photo</span> </label>
                  <input type="file" class="form-control" name="image" id="upload-img"/>
               </div>
             <button type="submit" class="btn btn-small">Save</button>
         </div>
         </form>
    </div>
  </div>
</div>


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

      <!--  ask question modal  --->
      
</div>

      

<div class="modal fade modal-about-mentor" id="askQuestionModel" tabindex="-1" role="dialog" aria-labelledby="about-mentorlLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Ask Your Question </h5>
            </div>
            <form action="{{ route('save.question') }}" method="POST">
            @csrf
            <div class="modal-body ask-q-modal">
               <p> You are asking from <span id="user-name" style="font-weight:bold" ></span> </p>
               <!-- <p>  </p> -->

               @if(Auth::check())
                  <div class="form-group mt-2">
                     <textarea name="question" required id="" placeholder="Type your quetion here"></textarea>
                  </div>
                  @if(Auth::check())
                     <input type="hidden" value="{{ Auth::user()->id }}" name="seeker_id">
                  @endif
                  <input type="hidden" name="mentor_id" value="">
                  <div class="text-right">
                  <button type="submit" class="btn btn-small ml-auto">Submit</button>
                  </div>
               @else 

               <p class="text-center">Please Login First <a href="{{ route('login') }}" class="btn btn-small" >Login</a> </p>   
               @endif
            </div>
            </form>
         </div>
      </div>
      </div>


      <div class="modal fade modal-about-mentor" id="ask-login" tabindex="-1" role="dialog" aria-labelledby="about-mentorlLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Welcome to Health Mentors</h5>
               </div>
            <div class="modal-body ask-q-modal">
               <p class="text-center">Please Login  <a href="{{ route('login') }}" class="btn btn-small" >Login</a> </p>   
            </div>
            </div>
         </div>
      </div>
</section>

@endsection('content')

@section('custom_js')
<script>

tinymce.init({ 
   selector:'.textarea',
   block_formats: 'Paragraph=p; Header 1=h1; Header 2=h2; Header 3=h3',
   branding: false,
   plugins: 'link image table',
   contextmenu: 'link image table'

});

function submitForm(postId)
{
   event.preventDefault();

   $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
   });
   var comment =  $('#comment'+postId).val();
   var postId  =  $('#post-id'+postId).val();

   if(comment) {

   } else {
      return false ; 
      exit;
   }

   $.ajax({
      method: "POST",
      url: "/save/comment",
      data : {comment:comment, postId : postId},
      success:function(data){
            var responseData   =  $.parseJSON(data);
         console.log($.parseJSON(data));
            $('#pre-comments'+postId).empty();
            $('#pre-comments'+postId).append(responseData[0]);
            $('#comment-form'+postId).trigger("reset");
            $('#comment-count'+postId).empty();
            $('#comment-count'+postId).append(responseData[1]);


      }, 
      error:function(){

      }
   })
}



function askQuestions(userData)
{
   var userId    =  userData[0];
   var userName  =  userData[1];
   $('#mentor_id').val(userId);
   $('#user-name').empty();
   $('#user-name').append(userName);
   $('#askQuestionModel').modal('show');
    
}

function getUserDetails(userId)
{
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
            $('#user-info').append(data);
        },
        error:function(){
        }
    })
}

    function addLike(postId)
    {

      $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

       $.ajax({
          method: "POST",
          url : "/add/post/likes",
          data : {postId : postId},
          success:function(data){
             console.log(data);
             $('#like-count'+postId).empty();
             $('#like-count'+postId).append(data[0]);
             if(data[1] == 1) {
               $('#like-button'+postId).addClass('liked');
             } else {
               $('#like-button'+postId).removeClass('liked');  
             }
             
          },
          error:function(){

          }
       })
    }

     $('#upload-img').on('change', function(e){

      var elementExists = document.getElementById("post-img");
      if(elementExists) {
         document.getElementById("post-img").remove();

      }

       for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

        var file = e.originalEvent.srcElement.files[i];
        
        var img = document.createElement("img");
        var reader = new FileReader();
        reader.onloadend = function() {
             img.src = reader.result;
             img.setAttribute("class", 'img-fluid');
             img.setAttribute("id", 'post-img');
            //  img.addClass('img-fluid');
        }
        reader.readAsDataURL(file);
        $('#post-image').append(img);
      //   $("#title").after(img);
    }
     });
</script>
@endsection


